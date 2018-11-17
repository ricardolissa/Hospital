<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class PersonasController extends Controller
{

    /**
     * Display a listing of the personas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $personas = Persona::paginate(25);

        return view('personas.index', compact('personas'));
    }

    /**
     * Show the form for creating a new persona.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('personas.create');
    }

    /**
     * Store a new persona in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Persona::create($data);

            return redirect()->route('personas.persona.index')
                             ->with('success_message', 'Persona was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified persona.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $persona = Persona::findOrFail($id);

        return view('personas.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified persona.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $persona = Persona::findOrFail($id);
        

        return view('personas.edit', compact('persona'));
    }

    /**
     * Update the specified persona in the storage.
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
            
            $persona = Persona::findOrFail($id);
            $persona->update($data);

            return redirect()->route('personas.persona.index')
                             ->with('success_message', 'Persona was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified persona from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $persona = Persona::findOrFail($id);
            $persona->delete();

            return redirect()->route('personas.persona.index')
                             ->with('success_message', 'Persona was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
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
            'nombre' => 'string|min:1|nullable',
            'apellido' => 'string|min:1|nullable',
            'dni' => 'string|min:1|nullable',
            'email' => 'nullable',
            'fecha_nacimiento' => 'string|min:1|nullable',
            'edad' => 'string|min:1|nullable',
     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
