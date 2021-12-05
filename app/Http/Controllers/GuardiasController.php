<?php

namespace App\Http\Controllers;

use App\Models\Guardia;
use App\Models\Medico;
use App\Models\Especialidad;
use App\Models\Persona;
use App\Http\Controllers\Controller;
//use App\Http\Requests\GuardiasFormRequest;
use Exception;
use Illuminate\Http\Request;


use DB;

class GuardiasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the guardias.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin','jmedico']);

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
        $medicos=Medico::All();
        $especialidades=Especialidad::All();

        
        return view('guardias.create', compact('medicos','especialidades'));
    }

    /**
     * Store a new guardia in the storage.
     *
     * @param App\Http\Requests\GuardiasFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
       try {
          


              
            $fecha = ['fecha' => $request->fecha];
       
            $data = $request->medicoAsignado;   

        
            $guardia = Guardia::create($fecha);
            
            $guardia->medicos()->sync($data);


            return redirect()->route('guardias.guardia.index')
                             ->with('success_message', 'Guardia fue creada con exito!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Esta Guardia ya fue creada. Corrija la fecha']);
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
     

        $medicos= Guardia::join("guardia_medico","guardia_medico.guardia_id","=","guardias.id")
      	->join ("medicos","medicos.id","=","guardia_medico.medico_id")
      	->where("guardia_medico.guardia_id", "=", $guardia->id)
        ->select("medicos.id","medicos.persona_id")
        
        ->get();

       $personas=[];
        foreach ($medicos as $medico => $value) {
        	
        	$p=Persona::findOrFail($value->persona_id);
        	array_push($personas, $p);

        }

        

       
        return view('guardias.show', compact('guardia','personas'));
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

         $medicos= Medico::All();
        
        

        return view('guardias.edit', compact('guardia','medicos'));
    }

    /**
     * Update the specified guardia in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\GuardiasFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */

      protected function getData(Request $request)
    {
        $rules = [
            'fecha'               => 'string|min:1|nullable',
            'medicoAsignado' => 'nullable',
        ];

        $data = $request->validate($rules);

        return $data;
    }


    public function update($id, Request $request)
    {
        try {
            

              $fecha = ['fecha' => $request->fecha];
       
            $data = $request->medicoAsignado;   
            $guardia = Guardia::findOrFail($id);
            $guardia->update($fecha);
            $guardia->medicos()->sync($data);

            return redirect()->route('guardias.guardia.index')
                             ->with('success_message', 'Guardia fue actualizada con exito!');

       } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
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
                             ->with('success_message', 'Guardia fue borrada con exito!!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }



      
    
} 