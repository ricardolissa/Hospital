<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Http\Controllers\Controller;
use App\Http\Requests\EspecialidadesFormRequest;
use Exception;

class EspecialidadesController extends Controller
{

    /**
     * Display a listing of the especialidades.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $especialidades = Especialidad::paginate(25);

        return view('especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new especialidad.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('especialidades.create');
    }

    /**
     * Store a new especialidad in the storage.
     *
     * @param App\Http\Requests\EspecialidadesFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(EspecialidadesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Especialidad::create($data);

            return redirect()->route('especialidades.especialidad.index')
                             ->with('success_message', 'Especialidad was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified especialidad.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $especialidad = Especialidad::findOrFail($id);

        return view('especialidades.show', compact('especialidad'));
    }

    /**
     * Show the form for editing the specified especialidad.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        

        return view('especialidades.edit', compact('especialidad'));
    }

    /**
     * Update the specified especialidad in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\EspecialidadsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, EspecialidadesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $especialidad = Especialidad::findOrFail($id);
            $especialidad->update($data);

            return redirect()->route('especialidades.especialidad.index')
                             ->with('success_message', 'Especialidad was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified especialidad from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $especialidad = Especialidad::findOrFail($id);
            $especialidad->delete();

            return redirect()->route('especialidades.especialidad.index')
                             ->with('success_message', 'Especialidad was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
