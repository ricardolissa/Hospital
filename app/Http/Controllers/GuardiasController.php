<?php

namespace App\Http\Controllers;

use App\Models\Guardia;
use App\Models\Medico;
use App\Models\Especialidad;
use App\Http\Controllers\Controller;
use App\Http\Requests\GuardiasFormRequest;
use Exception;
use Illuminate\Http\Request;
use DB;

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
                         ->withErrors(['unexpected_error' => 'Este es Se produjo un error inesperado al intentar procesar su solicitud.']);
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


   

    public function asignarGuardia(Request $request)
    {
        $especialidades=Especialidad::All();

       $idEspecialidad= $request->get('especialidades');

      
            //Consulta en tabla pivot
            $medicos = Medico::join("especialidad_medico","especialidad_medico.medico_id","=", "medicos.id" )
            ->join ("especialidades", "especialidades.id", "=", "especialidad_medico.especialidad_id")
            ->where("especialidad_medico.especialidad_id", "=", $idEspecialidad)
            ->select("*")
            ->get();


       
        return  view('guardias.asignarGuardia',compact('medicos','especialidades'));
    


       
        
    }

    
}
