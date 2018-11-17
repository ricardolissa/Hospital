<?php

namespace App\Http\Controllers;

use App\Models\Prioridad;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrioridadsFormRequest;
use Exception;

class PrioridadsController extends Controller
{

    /**
     * Display a listing of the prioridads.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $prioridads = Prioridad::paginate(25);

        return view('prioridads.index', compact('prioridads'));
    }

    /**
     * Show the form for creating a new prioridad.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('prioridads.create');
    }

    /**
     * Store a new prioridad in the storage.
     *
     * @param App\Http\Requests\PrioridadsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(PrioridadsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Prioridad::create($data);

            return redirect()->route('prioridads.prioridad.index')
                             ->with('success_message', 'Prioridad was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified prioridad.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $prioridad = Prioridad::findOrFail($id);

        return view('prioridads.show', compact('prioridad'));
    }

    /**
     * Show the form for editing the specified prioridad.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $prioridad = Prioridad::findOrFail($id);
        

        return view('prioridads.edit', compact('prioridad'));
    }

    /**
     * Update the specified prioridad in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\PrioridadsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, PrioridadsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $prioridad = Prioridad::findOrFail($id);
            $prioridad->update($data);

            return redirect()->route('prioridads.prioridad.index')
                             ->with('success_message', 'Prioridad was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified prioridad from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $prioridad = Prioridad::findOrFail($id);
            $prioridad->delete();

            return redirect()->route('prioridads.prioridad.index')
                             ->with('success_message', 'Prioridad was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
