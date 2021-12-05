<?php

namespace App\Http\Controllers;

use App\Models\Obrasocial;
use App\Http\Controllers\Controller;
use App\Http\Requests\ObrasocialsFormRequest;
use Exception;
use Illuminate\Http\Request;

class ObrasocialsController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the obrasocials.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
       $request->user()->authorizeRoles(['user', 'admin']);
        $obrasocials = Obrasocial::paginate(25);

        return view('obrasocials.index', compact('obrasocials'));
    }

    /**
     * Show the form for creating a new obrasocial.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('obrasocials.create');
    }

    /**
     * Store a new obrasocial in the storage.
     *
     * @param App\Http\Requests\ObrasocialsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ObrasocialsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Obrasocial::create($data);

            return redirect()->route('obrasocials.obrasocial.index')
                             ->with('success_message', 'Obra Social fue creada con exito!!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }

    /**
     * Display the specified obrasocial.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $obrasocial = Obrasocial::findOrFail($id);

        return view('obrasocials.show', compact('obrasocial'));
    }

    /**
     * Show the form for editing the specified obrasocial.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $obrasocial = Obrasocial::findOrFail($id);
        

        return view('obrasocials.edit', compact('obrasocial'));
    }

    /**
     * Update the specified obrasocial in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ObrasocialsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ObrasocialsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $obrasocial = Obrasocial::findOrFail($id);
            $obrasocial->update($data);

            return redirect()->route('obrasocials.obrasocial.index')
                             ->with('success_message', 'Obra Social fue actualizada con exito!!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }        
    }

    /**
     * Remove the specified obrasocial from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $obrasocial = Obrasocial::findOrFail($id);
            $obrasocial->delete();

            return redirect()->route('obrasocials.obrasocial.index')
                             ->with('success_message', 'Obra Social fue borrada con exito!!!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }



}
