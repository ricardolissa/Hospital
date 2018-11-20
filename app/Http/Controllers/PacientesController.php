<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Paciente;
use App\Models\Obrasocial;
use App\Http\Controllers\Controller;
use App\Http\Requests\PacientesFormRequest;
use Exception;

class PacientesController extends Controller
{

    /**
     * Display a listing of the pacientes.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $pacientes = Paciente::with('persona','obrasocial')->paginate(25);

        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new paciente.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $personas = Persona::pluck('nombre','id')->all();
$obrasocials = Obrasocial::pluck('numero_socio','id')->all();
        
        return view('pacientes.create', compact('personas','obrasocials'));
    }

    /**
     * Store a new paciente in the storage.
     *
     * @param App\Http\Requests\PacientesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(PacientesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Paciente::create($data);

            return redirect()->route('pacientes.paciente.index')
                             ->with('success_message', 'Paciente was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified paciente.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $paciente = Paciente::with('persona','obrasocial')->findOrFail($id);

        return view('pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified paciente.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        $personas = Persona::pluck('created_at','id')->all();
$obrasocials = Obrasocial::pluck('numero_socio','id')->all();

        return view('pacientes.edit', compact('paciente','personas','obrasocials'));
    }

    /**
     * Update the specified paciente in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\PacientesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, PacientesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $paciente = Paciente::findOrFail($id);
            $paciente->update($data);

            return redirect()->route('pacientes.paciente.index')
                             ->with('success_message', 'Paciente was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified paciente from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $paciente = Paciente::findOrFail($id);
            $paciente->delete();

            return redirect()->route('pacientes.paciente.index')
                             ->with('success_message', 'Paciente was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}