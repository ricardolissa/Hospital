<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Paciente;
use App\Models\Obrasocial;
use App\Http\Controllers\Controller;
use App\Http\Requests\PacientesFormRequest;
use Exception;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the pacientes.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        
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
        $personas = Persona::pluck('dni','id')->all();
        $obrasocials = Obrasocial::pluck('nombre','id')->all();
        
        return view('pacientes.create', compact('personas','obrasocials'));
    }

    public function create2()
    {
        $personas = Persona::pluck('dni','id')->all();
        
        $obrasocials = Obrasocial::pluck('nombre','id')->all();
        
        return view('vistadm.admnewpaciente',compact('personas', 'obrasocials'));
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
                             ->with('success_message', 'Paciente fue creado con exito!!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }

 public function store2(PacientesFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Paciente::create($data);

            return redirect()->route('home')
                             ->with('success_message', 'Paciente fue creado con exito!!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
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
        $personas = Persona::pluck('dni','id')->all();
        $obrasocials = Obrasocial::pluck('nombre','id')->all();

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
                             ->with('success_message', 'Paciente fue actualizado con exito!!!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
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
                             ->with('success_message', 'Paciente fue borrado con exito');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Un error no permitio borrar al paciente']);
        }
    }



}
