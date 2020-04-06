<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use App\Models\Guardia;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Prioridad;
use App\Models\Persona;
use Illuminate\Http\Request;
use Exception;
use Carbon\Carbon;


class ConsultasController extends Controller
{

    /**
     * Display a listing of the consultas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $consultasObjects = Consulta::with('paciente','medico','guardia','prioridad')->paginate(25);

        return view('consultas.index', compact('consultasObjects'));
    }

    /**
     * Show the form for creating a new consultas.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $pacientes = Paciente::pluck('antecedentes_familiares','id')->all();
$medicos = Medico::pluck('foto','id')->all();
$guardias = Guardia::pluck('id','id')->all();
$prioridads = Prioridad::pluck('nombre','id')->all();
        
        return view('consultas.create', compact('pacientes','medicos','guardias','prioridads'));
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
            
            $data = $this->getData($request);
            
            Consulta::create($data);

            return redirect()->route('consultas.consulta.index')
                             ->with('success_message', 'Consulta was successfully added.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
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
        $consultas = Consulta::with('paciente','medico','guardia','prioridad')->findOrFail($id);

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
        $consultas = Consulta::findOrFail($id);
        $pacientes = Paciente::pluck('antecedentes_familiares','id')->all();
$medicos = Medico::pluck('foto','id')->all();
$guardias = Guardia::pluck('id','id')->all();
$prioridads = Prioridad::pluck('nombre','id')->all();

        return view('consultas.edit', compact('consultas','pacientes','medicos','guardias','prioridads'));
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
                             ->with('success_message', 'Consulta was successfully updated.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
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
                             ->with('success_message', 'Consulta was successfully deleted.');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
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
            'diagnostico' => 'string|min:1|nullable',
            'receta' => 'string|min:1|nullable',
            'fecha' => 'string|min:1|nullable',
            'arribo' => 'string|min:1|nullable',
            'egreso' => 'string|min:1|nullable',
            'tiempo_consulta' => 'string|min:1|nullable',
            'paciente_id' => 'nullable',
            'medico_id' => 'nullable',
            'guardia_id' => 'nullable',
            'prioridad_id' => 'nullable',
            'padecimiento_actual' => 'string|min:1|nullable',
            'atendido' => 'string|min:1|nullable', 
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    protected function ConsultaMedico()
    {


        $consultas = Consulta::with('paciente')->orderBy('prioridad_id')->paginate(25);


         return view('consultas.consultamedico', compact('consultas'));


    }

        protected function ConsultaMedicoEdit($id)
    {


        $consulta = Consulta::findOrFail($id);
        $pacientes = Paciente::pluck('id','id')->all();
        $medicos = Medico::pluck('id','id')->all();
        $guardias = Guardia::pluck('id','id')->all();
        $prioridads = Prioridad::pluck('nombre','id')->all();

        return view('consultas.consultamedicoedit', compact('consulta','pacientes','medicos','guardias','prioridads'));


    }

     public function ConsultaMedicoUpdate($id, Request $request)
    {
        //actualiza datos despues que termina la consulta, egreso, tiempo de atencion, y faltantes
        //try {
            

            
            $tconsulta= Consulta::findOrFail($id);
            $data = $this->getData($request);
            $data['egreso']=Carbon::now();
            //faltan datos para realizar la resta!!!!! no aparece el tiempo de arribo.
           //$data['padecimiento_actual']='esto se cambio';   
            //$data['tiempo_consulta']=date('H:i:s');
            
            //utilizacion de Carbon para manipular horarios
          //  $tconsulta= Consulta::findOrFail($id);
            $arribo=$tconsulta->arribo;//->format('h:i:s');
            //dd($arribo);
            $egreso=$data['egreso'];//->format('h:i:s');
            //dd($egreso);
            
            $tiempoconsulta= $arribo->diff($egreso);
            $h=$tiempoconsulta->h;
            $i=$tiempoconsulta->i;
            $s=$tiempoconsulta->s;
            $diferencia=Carbon::createFromTime($h, $i, $s);
           // dd($diferencia);
            //dd($a);
            //dd($tiempoconsulta)); //devuelve el intervalo con los date en cero
            
/// prueba
/*$year='2020';
$month='1';
$day='5';
$tz='00:00:00';
$fecha1 = Carbon::createFromDate($year, $month, $day);

//dd($fecha1);
$ff=Carbon::create('2020','3','23','00','4','5');

$f2=Carbon::create('2020','3','22','23','4','5');

$dife= $ff->diff($f2);
dd($dife);
*/
            $data['tiempo_consulta']=$diferencia; 
            $data['atendido']='SI';

            //dd($data['tiempo_consulta']);

/*          al querer actualizar 
ERROR     preg_match() expects parameter 2 to be string, array given
            espera 2 parametros y recibe 1

*/
            
            
            $consultas = Consulta::findOrFail($id);
            $consultas->update($data);

            return redirect()->route('consultas.consulta.index')
                             ->with('success_message', 'Consulta was successfully updated.');

        //} 
        //catch (Exception $exception) {

          //  return back()->withInput()
            //             ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        //}        
    }

        

}
