<?php

namespace App\Http\Controllers;

use App\Models\Guardia;
use App\Models\Medico;
use App\Http\Controllers\Controller;
use App\Http\Requests\GuardiasFormRequest;
use Exception;

class GuardiasController extends Controller
{

    /**
     * Display a listing of the guardias.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $guardias = Guardia::paginate(25);

        return view('guardias.index', compact('guardias'));
    }

    /**
     * Show the form for creating a new guardia.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('guardias.create');
    }

    /**
     * Store a new guardia in the storage.
     *
     * @param App\Http\Requests\GuardiasFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(GuardiasFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Guardia::create($data);

            return redirect()->route('guardias.guardia.index')
                             ->with('success_message', 'Guardia was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified guardia.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $guardia = Guardia::findOrFail($id);

        return view('guardias.show', compact('guardia'));
    }

    /**
     * Show the form for editing the specified guardia.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $guardia = Guardia::findOrFail($id);
        

        return view('guardias.edit', compact('guardia'));
    }

    /**
     * Update the specified guardia in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\GuardiasFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, GuardiasFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $guardia = Guardia::findOrFail($id);
            $guardia->update($data);

            return redirect()->route('guardias.guardia.index')
                             ->with('success_message', 'Guardia was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified guardia from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $guardia = Guardia::findOrFail($id);
            $guardia->delete();

            return redirect()->route('guardias.guardia.index')
                             ->with('success_message', 'Guardia was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }


    public function asignarguardia()
    {
        $medicos=Medico::All();

        return  view('guardias.asignarguardia',compact('medicos')); 
        //continuar cargar medicos, seleccionarlos y hacer todo el guardado automatico. 13/03/2020
    }

    public function asignarguardiastore(GuardiasFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Guardia::create($data);

            return redirect()->route('guardias.guardia.index')
                             ->with('success_message', 'Guardia was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }
}
