<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Persona;
use App\Http\Controllers\Controller;
use App\Http\Requests\MedicosFormRequest;
use Exception;

class MedicosController extends Controller
{

    /**
     * Display a listing of the medicos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $medicosObjects = Medico::with('persona')->paginate(25);

        return view('medicos.index', compact('medicosObjects'));
    }

    /**
     * Show the form for creating a new medicos.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
         $personas = Persona::pluck('nombre','id')->all();
        
        return view('medicos.create', compact('personas'));
    }

    /**
     * Store a new medicos in the storage.
     *
     * @param App\Http\Requests\MedicosFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(MedicosFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Medico::create($data);

            return redirect()->route('medicos.medicos.index')
                             ->with('success_message', 'Medico was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified medicos.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $medicos = Medico::with('persona')->findOrFail($id);

        return view('medicos.show', compact('medicos'));
    }

    /**
     * Show the form for editing the specified medicos.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $medicos = Medico::findOrFail($id);
        $personas = Persona::pluck('nombre','id')->all();

        return view('medicos.edit', compact('medicos','personas'));
    }

    /**
     * Update the specified medicos in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\MedicosFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, MedicosFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $medicos = Medico::findOrFail($id);
            $medicos->update($data);

            return redirect()->route('medicos.medicos.index')
                             ->with('success_message', 'Medico was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified medicos from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $medicos = Medico::findOrFail($id);
            $medicos->delete();

            return redirect()->route('medicos.medicos.index')
                             ->with('success_message', 'Medico was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    public function indexmed(){
        return view('medicos.indexmed');
    }

}
