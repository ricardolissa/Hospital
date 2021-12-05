<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use App\Models\Guardia;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Prioridad;
use App\Models\Persona;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;
use PDF;

class ConsultasController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the consultas.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {

     $request->user()->authorizeRoles(['user', 'admin','jmedico','medico']);

        $consultasObjects = Consulta::with('paciente', 'medico', 'guardia', 'prioridad')->paginate(25);

        return view('consultas.index', compact('consultasObjects'));
    }

    /**
     * Show the form for creating a new consultas.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $pacientes  = Paciente::all();
        $medicos    = Medico::all();
        $guardias   = Guardia::all();
        $prioridads = Prioridad::all();

        return view('consultas.create', compact('pacientes', 'medicos', 'guardias', 'prioridads'));
    }

    /**
     * Store a new consultas in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
 

            $fecha = $request->fecha;
            $data  = $this->getData($request);
       
            $consulta = Consulta::create($data);

            $consulta->guardia()->sync();

            return redirect()->route('consultas.consulta.index')
                ->with('success_message', 'Consulta fue creada con exito!!.');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
 }

    /**
     * Display the specified consultas.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $consultas = Consulta::with('paciente', 'medico', 'guardia', 'prioridad')->findOrFail($id);
        

        return view('consultas.show', compact('consultas'));
    }

    /**
     * Show the form for editing the specified consultas.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $consultas  = Consulta::findOrFail($id);
       // dd($consultas);
        $pacientes  = Paciente::findOrFail($consultas->paciente_id);
        $medicos    = Medico::findOrFail($consultas->medico_id);
        $guardias   = Guardia::findOrFail($consultas->guardia_id);
        $prioridads = Prioridad::findOrFail($consultas->prioridad_id);

        return view('consultas.edit', compact('consultas', 'pacientes', 'medicos', 'guardias', 'prioridads'));
    }

    /**
     * Update the specified consultas in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $consultas = Consulta::findOrFail($id);
            $consultas->update($data);

            return redirect()->route('consultas.consulta.index')
                ->with('success_message', 'Consulta fue actualizada con exito!!.');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud..']);
        }
    }

    /**
     * Remove the specified consultas from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $consultas = Consulta::findOrFail($id);
            $consultas->delete();

            return redirect()->route('consultas.consulta.index')
                ->with('success_message', 'Consulta fue borrada con exito!!.');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }

    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'diagnostico'         => 'string|min:1|nullable',
            'receta'              => 'string|min:1|nullable',
            'fecha'               => 'string|min:1|required',
            'arribo'              => 'string|min:1|nullable',
            'egreso'              => 'string|min:1|nullable',
            'tiempo_consulta'     => 'string|min:1|nullable',
            'paciente_id'         => 'required',
            'medico_id'           => 'nullable',
            'guardia_id'          => 'required',
            'prioridad_id'        => 'required',
            'padecimiento_actual' => 'string|min:1|nullable',
            'atendido'            => 'string|min:1|nullable',
        ];

        $data = $request->validate($rules);

        return $data;
    }

    protected function ConsultaMedico()
    {

        $consultas = Consulta::with('paciente')
            ->where('consultas.atendido', '=', null)
            ->orderBy('prioridad_id', 'ASC')
            ->paginate(25);

        return view('consultas.consultamedico', compact('consultas'));

    }

    protected function ConsultaMedicoEdit($id)
    {

        $consulta   = Consulta::findOrFail($id);
        
        $userpersonaid = auth()->user()->persona_id;
        
        $medicos = DB::table('medicos')
        ->select('id')
        ->where('persona_id','=',$userpersonaid)
        ->get();

       

      $pacientes  = Paciente::findOrFail($consulta->paciente_id);

     //   $medicos    = Medico::findOrFail($medico_id->persona_id=5);
     //dd($medicos);
     //   dd($pacientes);
        $guardias   = Guardia::findOrFail($consulta->guardia_id);
        $prioridads = Prioridad::findOrFail($consulta->prioridad_id);


        return view('consultas.consultamedicoedit', compact('consulta', 'pacientes', 'medicos', 'guardias', 'prioridads'));

    }

    public function ConsultaMedicoUpdate($id, Request $request)
    {
        //actualiza datos despues que termina la consulta, egreso, tiempo de atencion, y faltantes
      try {
            
            $tconsulta      = Consulta::findOrFail($id);
            $data           = $this->getData($request);
         
            $data['egreso'] = Carbon::now();

            $arribo = $tconsulta->arribo;

            $egreso = $data['egreso'];

            $tiempoconsulta = $arribo->diff($egreso);
            $h              = $tiempoconsulta->h;
            $i              = $tiempoconsulta->i;
            $s              = $tiempoconsulta->s;
            $diferencia     = Carbon::createFromTime($h, $i, $s);
            //dd($tiempoconsulta)); //devuelve el intervalo con los date en cero

            $data['tiempo_consulta'] = $diferencia;
            $data['atendido']        = 'SI';


            //// tengo que obtener el id del usuarios que es medico 
            //y guardarlo en $data[medico_id]
            $persona_id=$request->user()->persona_id;
            $persona = Persona::findOrFail($persona_id);
            
            
            $medico = DB::table('medicos')
            ->select('medicos.id')
            ->where('medicos.persona_id', $persona_id)
            ->get();


          $data['medico_id']=$medico[0]->id;
            
          //  dd($data['medico_id']);

            $consultas = Consulta::findOrFail($id);
            $consultas->update($data);

            $consultas = Consulta::with('paciente')
                ->where('consultas.atendido', '=', null)
                ->orderBy('prioridad_id', '<=', '4')
                ->paginate(25);

            return redirect()->route('consultas.consulta.consultamedico', compact('consultas'))
                ->with('success_message', 'Consulta fue realizada con exito!!.');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        }
    }

    public function calculoEstimadoConsulta()
    {

/**********************************************************************************************/
/** Realiza la consulta a la base de datos, obteniendo las consultas segun las condiciones **/
        $consultasAtendidas = Consulta::where('arribo', '<=', 'now') //'2021-04-11 00:01:01')
            ->where('consultas.atendido', '=', 'SI')
            ->where('consultas.fecha','=',Carbon::now())
            ->get();

        /** como es una coleccion se debe posicionar en cada uno de los elementos de la mismas, es
        tipo DateTime -> tenemos que dar el formato de hora que es lo que necesitamos */

        $cadena = 0;
//Realiza la suma de las horas
        for ($i = 0; $i < count($consultasAtendidas); $i++) {

            $cadena += strtotime($consultasAtendidas[$i]->tiempo_consulta); // - strtotime("now");

        }

//Promedio de horas
        if (count($consultasAtendidas) > 0) {
            $resultado = $cadena / count($consultasAtendidas);
        } else {
            $resultado = 0;
        }

        $tiempo_espera = date("H:i:s", $resultado); //00:02:42 promedio obtenido pasado al formato H:i:s
//dd($tiempo_espera, $consultasAtendidas,Carbon::now());
        $tiempo_espera_hora = Carbon::parse($tiempo_espera)->hour;

        $tiempo_espera_minute = Carbon::parse($tiempo_espera)->minute;

        $tiempo_espera_second = Carbon::parse($tiempo_espera)->second;

        $tiempo_espera_time = Carbon::createFromTime($tiempo_espera_hora, $tiempo_espera_minute, (int) $tiempo_espera_second);

        $consultasNoAtendidas = Consulta::with('paciente')
            ->where('arribo', '<=', 'now')
            ->where('consultas.atendido', '=', null)
            ->where('consultas.prioridad_id', '>=', 3)
            ->orderBy('consultas.prioridad_id', 'ASC')
            ->get();
//dd($consultasNoAtendidas);

        for ($i = 0; $i < count($consultasNoAtendidas); $i++) {

            if ($consultasNoAtendidas[$i]->prioridad_id == 5) {

                $tiempo_espera_time = $tiempo_espera_time->addMinutes(4);
                //addHours($tiempo_espera_hora)->addMinutes($tiempo_espera_minute)->addSecond($tiempo_espera_second);
            

            }
            if ($consultasNoAtendidas[$i]->prioridad_id == 4) {

                $tiempo_espera_time = $tiempo_espera_time->addMinutes(3);
                //addHours($tiempo_espera_hora)->addMinutes($tiempo_espera_minute)->addSecond($tiempo_espera_second);

            }
            if ($consultasNoAtendidas[$i]->prioridad_id == 3) {

                $tiempo_espera_time = $tiempo_espera_time->addMinutes(2);

            }

            $consultasNoAtendidas[$i]['horaE'] = $tiempo_espera_time;
            $consultasNoAtendidas[$i]['horaE'] = $consultasNoAtendidas[$i]['horaE']->format("H:i:s");

        }

     
        return view('consultas.tiempodeconsulta', compact('consultasNoAtendidas'));

    }

    public function historiaclinica(Request $request)
    {

        // id del paciente
   //   try {
            $paciente_id = DB::table('pacientes')
                ->join('personas', 'personas.id', '=', 'pacientes.persona_id')
                ->join('obrasociales', 'obrasociales.id', '=', 'pacientes.obrasocial_id')
                ->select('pacientes.id')
                ->where('personas.dni', $request->get('dni'))
                ->get();
 
 $historiaclinicas = null;

 if ($paciente_id->first() != null)
    { 
         
        $historiaclinicas  = Consulta::All()
                ->where('paciente_id', '=', $paciente_id->first()->id);
        $paciente_id = $paciente_id->first()->id;
    }        
        
                  

            return view('consultas.historiaclinica', compact('historiaclinicas','persona','medico','paciente_id'));
     /* } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'DNI invalido']);
        }
*/
    }

    public function showHistoria($id)
    {
        $consultas = Consulta::with('paciente', 'medico', 'guardia', 'prioridad')->findOrFail($id);

        return view('consultas.showHistoria', compact('consultas'));
    }

   public function historiaPdf(Request $request){
 

                $historiaclinicas  = Consulta::All()
                ->where('paciente_id', '=', $request->historiaPdf);
                
                $paciente = Paciente::findOrFail($request->historiaPdf);

                $fecha=Carbon::now();
                //dd($paciente->persona->nombre, $paciente->persona->apellido);
       
                  $pdf = PDF::loadView('pdf.historiaPdf', compact('historiaclinicas','persona','medico','paciente','fecha'));
                  $pdf->setPaper('A4');
                  $a=1;

                  return $pdf->download( $paciente->persona->apellido.' '.$paciente->persona->nombre.' '.'Historia Clinica.pdf');

         
     
   }
   public function consultaPdf(Request $request) { 

    $id = $request->consultaPdf;

    $consultas = Consulta::with('paciente', 'medico', 'guardia', 'prioridad')->findOrFail($id);
    $fecha=Carbon::now();

    $pdf = PDF::loadView('pdf.consultaPdf', compact('consultas','fecha'));
    $pdf->setPaper('A4');
    
    return $pdf->stream($consultas->fecha.' '.$consultas->paciente->persona->apellido.' '.$consultas->paciente->persona->nombre.' '.'Consulta.pdf');



   }
    
   
}
