<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Padministrativo;
use App\Http\Controllers\Controller;
use App\Http\Requests\PadministrativosFormRequest;
use Exception;

class PadministrativosController extends Controller
{

    /**
     * Display a listing of the padministrativos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $padministrativos = Padministrativo::with('persona')->paginate(25);

        return view('padministrativos.index', compact('padministrativos'));
    }

    /**
     * Show the form for creating a new padministrativo.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $personas = Persona::pluck('nombre','id')->all();
        
        return view('padministrativos.create', compact('personas'));
    }

    /**
     * Store a new padministrativo in the storage.
     *
     * @param App\Http\Requests\PadministrativosFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(PadministrativosFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Padministrativo::create($data);

            return redirect()->route('padministrativos.padministrativo.index')
                             ->with('success_message', 'Padministrativo was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified padministrativo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $padministrativo = Padministrativo::with('persona')->findOrFail($id);

        return view('padministrativos.show', compact('padministrativo'));
    }

    /**
     * Show the form for editing the specified padministrativo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $padministrativo = Padministrativo::findOrFail($id);
        $personas = Persona::pluck('created_at','id')->all();

        return view('padministrativos.edit', compact('padministrativo','personas'));
    }

    /**
     * Update the specified padministrativo in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\PadministrativosFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, PadministrativosFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $padministrativo = Padministrativo::findOrFail($id);
            $padministrativo->update($data);

            return redirect()->route('padministrativos.padministrativo.index')
                             ->with('success_message', 'Padministrativo was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified padministrativo from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $padministrativo = Padministrativo::findOrFail($id);
            $padministrativo->delete();

            return redirect()->route('padministrativos.padministrativo.index')
                             ->with('success_message', 'Padministrativo was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
