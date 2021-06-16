<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Guardia;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Prioridad;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class ConsultasController extends Controller
{

    /**
     * Display a listing of the consultas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $consultas = Consulta::with('paciente','medico','guardia','prioridad')->paginate(25);

        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new consulta.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $pacientes = Paciente::pluck('id','id')->all();
$medicos = Medico::pluck('id','id')->all();
$guardias = Guardia::pluck('id','id')->all();
$prioridads = Prioridad::pluck('nombre','id')->all();
        
        return view('consultas.create', compact('pacientes','medicos','guardias','prioridads'));

    /**
     * Store a new consulta in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
}
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Consulta::create($data);

            return redirect()->route('consultas.consulta.index')
                             ->with('success_message', 'Consulta fue creada con exito!!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }

    /**
     * Display the specified consulta.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $consulta = Consulta::with('paciente','medico','guardia','prioridad')->findOrFail($id);

        return view('consultas.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified consulta.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $consulta = Consulta::findOrFail($id);
        $pacientes = Paciente::pluck('id','id')->all();
$medicos = Medico::pluck('id','id')->all();
$guardias = Guardia::pluck('id','id')->all();
$prioridads = Prioridad::pluck('nombre','id')->all();

        return view('consultas.edit', compact('consulta','pacientes','medicos','guardias','prioridads'));
    }

    /**
     * Update the specified consulta in the storage.
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
            
            $consulta = Consulta::findOrFail($id);
            $consulta->update($data);

            return redirect()->route('consultas.consulta.index')
                             ->with('success_message', 'Consulta fue actualizada con exito!!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }        
    }

    /**
     * Remove the specified consulta from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $consulta = Consulta::findOrFail($id);
            $consulta->delete();

            return redirect()->route('consultas.consulta.index')
                             ->with('success_message', 'Consulta fue borrada con exito!!!');

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

}
