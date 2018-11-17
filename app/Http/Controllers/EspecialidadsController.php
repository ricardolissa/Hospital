<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use App\Http\Controllers\Controller;
use App\Http\Requests\EspecialidadsFormRequest;
use Exception;

class EspecialidadsController extends Controller
{

    /**
     * Display a listing of the especialidads.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $especialidads = Especialidad::paginate(25);

        return view('especialidads.index', compact('especialidads'));
    }

    /**
     * Show the form for creating a new especialidad.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('especialidads.create');
    }

    /**
     * Store a new especialidad in the storage.
     *
     * @param App\Http\Requests\EspecialidadsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(EspecialidadsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Especialidad::create($data);

            return redirect()->route('especialidads.especialidad.index')
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

        return view('especialidads.show', compact('especialidad'));
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
        

        return view('especialidads.edit', compact('especialidad'));
    }

    /**
     * Update the specified especialidad in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\EspecialidadsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, EspecialidadsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $especialidad = Especialidad::findOrFail($id);
            $especialidad->update($data);

            return redirect()->route('especialidads.especialidad.index')
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

            return redirect()->route('especialidads.especialidad.index')
                             ->with('success_message', 'Especialidad was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
