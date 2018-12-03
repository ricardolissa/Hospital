<?php

namespace App\Http\Controllers;

use App\Models\Medicos;
use App\Models\Consulta;
use App\Models\Paciente;
use App\Models\Guardia;
use App\Models\Prioridad;
use App\Http\Controllers\Controller;
use App\Http\Requests\ConsultasFormRequest;
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
        $consultas = Consulta::with('paciente','medicos','guardias','prioridads')->paginate(25);

        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new consulta.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $pacientes = Paciente::pluck('antecedentes_familiares','id')->all();
    $medicos = Medicos::pluck('id','id')->all();
    $guardia = Guardia::pluck('id','id')->all();
    $prioridads = Prioridad::pluck('nombre','id')->all();
        
        return view('consultas.create', compact('pacientes','medicos','guardia','prioridads'));
    }

    /**
     * Store a new consulta in the storage.
     *
     * @param App\Http\Requests\ConsultasFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ConsultasFormRequest $request)
    {
       // try {
            
            $data = $request->getData();
            
            Consulta::create($data);

            return redirect()->route('consultas.consulta.index')
                             ->with('success_message', 'Consulta was successfully added!');

/*} catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }*/
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
        $consulta = Consulta::with('paciente','medico','guardium','prioridad')->findOrFail($id);

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
        $pacientes = Paciente::pluck('antecedentes_familiares','id')->all();
$medicos = Medico::pluck('foto','id')->all();
$guardia = Guardia::pluck('id','id')->all();
$prioridads = Prioridad::pluck('nombre','id')->all();

        return view('consultas.edit', compact('consulta','pacientes','medicos','guardia','prioridads'));
    }

    /**
     * Update the specified consulta in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ConsultasFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ConsultasFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $consulta = Consulta::findOrFail($id);
            $consulta->update($data);

            return redirect()->route('consultas.consulta.index')
                             ->with('success_message', 'Consulta was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
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
                             ->with('success_message', 'Consulta was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
