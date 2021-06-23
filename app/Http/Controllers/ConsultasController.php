<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use App\Models\Guardia;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Prioridad;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class ConsultasController extends Controller
{

    /**
     * Display a listing of the consultas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
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
        $pacientes  = Paciente::pluck('antecedentes_familiares', 'id')->all();
        $medicos    = Medico::pluck('foto', 'id')->all();
        $guardias   = Guardia::pluck('id', 'id')->all();
        $prioridads = Prioridad::pluck('nombre', 'id')->all();

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
        $pacientes  = Paciente::pluck('antecedentes_familiares', 'id')->all();
        $medicos    = Medico::pluck('foto', 'id')->all();
        $guardias   = Guardia::pluck('id', 'id')->all();
        $prioridads = Prioridad::pluck('nombre', 'id')->all();

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
            'fecha'               => 'string|min:1|nullable',
            'arribo'              => 'string|min:1|nullable',
            'egreso'              => 'string|min:1|nullable',
            'tiempo_consulta'     => 'string|min:1|nullable',
            'paciente_id'         => 'nullable',
            'medico_id'           => 'nullable',
            'guardia_id'          => 'nullable',
            'prioridad_id'        => 'nullable',
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
            ->orderBy('prioridad_id', '<=', '4')
            ->paginate(25);

        return view('consultas.consultamedico', compact('consultas'));

    }

    protected function ConsultaMedicoEdit($id)
    {

        $consulta   = Consulta::findOrFail($id);
        $pacientes  = Paciente::pluck('id', 'id')->all();
        $medicos    = Medico::pluck('id', 'id')->all();
        $guardias   = Guardia::pluck('id', 'id')->all();
        $prioridads = Prioridad::pluck('nombre', 'id')->all();

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
            ->get();

//dd($consultas);
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
        
        $tiempo_espera_hora  = Carbon::parse($tiempo_espera)->hour * 3600; 
        
        $tiempo_espera_minute = Carbon::parse($tiempo_espera)->minute; 
        
        $tiempo_espera_second = Carbon::parse($tiempo_espera)->second;
     
        
        $tiempo_espera_time = Carbon::createFromTime($tiempo_espera_hora, $tiempo_espera_minute, (int)$tiempo_espera_second); 


        $consultasNoAtendidas = Consulta::with('paciente')
            ->where('arribo', '<=', 'now')
            ->where('consultas.atendido', '=', null)
            ->where('consultas.prioridad_id', '>=', 3)
            ->orderBy('consultas.prioridad_id', 'ASC')
            ->get();



for ($i = 0; $i < count($consultasNoAtendidas); $i++) {


 if($consultasNoAtendidas[$i]->prioridad_id == 5){ 

     $tiempo_espera_time = $tiempo_espera_time->addHours($tiempo_espera_hora)->addMinutes($tiempo_espera_minute)->addSecond($tiempo_espera_second);
      
    }
    if($consultasNoAtendidas[$i]->prioridad_id == 4){

       $tiempo_espera_time = $tiempo_espera_time->addHours($tiempo_espera_hora)->addMinutes($tiempo_espera_minute)->addSecond($tiempo_espera_second);
      
        }
    if($consultasNoAtendidas[$i]->prioridad_id == 3){

        $tiempo_espera_time = $tiempo_espera_time->addMinutes(20);
        
        }

       
        $consultasNoAtendidas[$i]['horaE'] = $tiempo_espera_time;
        $consultasNoAtendidas[$i]['horaE'] = $consultasNoAtendidas[$i]['horaE']->format("H:i:s");
   
}








       /*
//fuciona--------------
            $arribohora      = Carbon::parse($consultasNoAtendidas[0]->arribo)->hour * 3600;
            $arribominute    = Carbon::parse($consultasNoAtendidas[0]->arribo)->minute * 60;
            $arribosecond    = Carbon::parse($consultasNoAtendidas[0]->arribo)->second; //23:37
            $resultadohora   = Carbon::parse($tiempo_espera)->hour * 3600;
            $resultadominute = Carbon::parse($tiempo_espera)->minute * 60;
            $resultadosecond = Carbon::parse($tiempo_espera)->second;

            $sumahora   = ($arribohora + $resultadohora) / 3600;
            $sumaminute = ($arribominute + $resultadominute) / 60;
            $sumasecond = ($arribosecond + $resultadosecond);

            echo Carbon::createFromTime($sumahora, $sumaminute, $sumasecond);
*//*
            for ($i = 0; $i < count($consultasNoAtendidas); $i++) {

                $arribohora      = Carbon::parse($consultasNoAtendidas[$i]->arribo)->hour * 3600;
                $arribominute    = Carbon::parse($consultasNoAtendidas[$i]->arribo)->minute * 60;
                $arribosecond    = Carbon::parse($consultasNoAtendidas[$i]->arribo)->second; //23:37
                $resultadohora   = Carbon::parse($tiempo_espera)->hour * 3600;
                $resultadominute = Carbon::parse($tiempo_espera)->minute * 60;
                $resultadosecond = Carbon::parse($tiempo_espera)->second;

                $sumahora   = ($arribohora + $resultadohora) / 3600;
                $sumaminute = ($arribominute + $resultadominute) / 60;
                $sumasecond = ($arribosecond + $resultadosecond) /60;

                $horaE = Carbon::createFromTime($sumahora, $sumaminute, (int)$sumasecond);
                $consultasNoAtendidas[$i]['horaE'] = $horaE;
                echo Carbon::now() . " Carbon / --- / horaE ";
                echo $horaE . " / tiempo_espera "; echo $tiempo_espera . "   /  ";
$ahora = Carbon::now();
                echo Carbon::parse($horaE)->minute + Carbon::parse($tiempo_espera)->minute . " / ----------- / ";
                 $hora= ($horaE->hour - $ahora->hour)/1000;
                 $minute=  ($horaE->minute - $ahora->minute)/1000;
                 $limite = (60*1000)/1000;
                 if($hora <= $limite){
                    if($minute <= $limite){
                     $horaE = $horaE->addMinutes(1);

                 }
                 echo ($horaE->hour - $ahora->hour)  . " ->diferencia horas:    ";
                 echo ($horaE->minute - $ahora->minute)  . " ->diferencia minutes:    ";
                 echo $horaE  . " ->HoraE    ";
                    }
                //if (Carbon::now()>$horaE ){
                
                 $diffInHours = $horaE->diffInHours($ahora);
                 $diffInMinutes = $horaE->diffInMinutes($ahora);
                 $diffInSeconds = $horaE->diffInSeconds($ahora);
                 
               
                if($horaE <= $ahora){
                $horaE = $horaE->addMinutes(0);
                $consultasNoAtendidas[$i]['horaE'] = $horaE;
                $consultasNoAtendidas[$i]['horaE'] = $consultasNoAtendidas[$i]['horaE']->format("H:i:s");
                // $tiempo_espera_time = $tiempo_espera_time->addMinutes(3);
               
                }
               
     
            }
  
        }       
       */
//AutoReload => https://www.youtube.com/watch?v=Z0QRNeUYsMM

        return view('consultas.tiempodeconsulta', compact('consultasNoAtendidas'));

    }

}
