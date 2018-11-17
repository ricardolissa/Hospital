<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Telefono;
use App\Http\Controllers\Controller;
use App\Http\Requests\TelefonosFormRequest;
use Exception;

class TelefonosController extends Controller
{

    /**
     * Display a listing of the telefonos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $telefonos = Telefono::with('persona')->paginate(25);

        return view('telefonos.index', compact('telefonos'));
    }

    /**
     * Show the form for creating a new telefono.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $personas = Persona::pluck('nombre','id')->all();
        
        return view('telefonos.create', compact('personas'));
    }

    /**
     * Store a new telefono in the storage.
     *
     * @param App\Http\Requests\TelefonosFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(TelefonosFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Telefono::create($data);

            return redirect()->route('telefonos.telefono.index')
                             ->with('success_message', 'Telefono was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified telefono.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $telefono = Telefono::with('persona')->findOrFail($id);

        return view('telefonos.show', compact('telefono'));
    }

    /**
     * Show the form for editing the specified telefono.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $telefono = Telefono::findOrFail($id);
        $personas = Persona::pluck('nombre','id')->all();

        return view('telefonos.edit', compact('telefono','personas'));
    }

    /**
     * Update the specified telefono in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\TelefonosFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, TelefonosFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $telefono = Telefono::findOrFail($id);
            $telefono->update($data);

            return redirect()->route('telefonos.telefono.index')
                             ->with('success_message', 'Telefono was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified telefono from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $telefono = Telefono::findOrFail($id);
            $telefono->delete();

            return redirect()->route('telefonos.telefono.index')
                             ->with('success_message', 'Telefono was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
