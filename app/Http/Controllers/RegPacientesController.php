<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegPacientesFormRequest;
use App\Models\Obrasocial;
use App\Models\Paciente;
use App\Models\Persona;
use App\Models\Prioridad;
use App\Models\Consulta;
use Exception;
use Illuminate\Http\Request;
use DB;

class RegPacientesController extends Controller
{

      // no deja entrar a la pagina si no esta logueado.
    /* public function __construct()
    {
        $this->middleware('auth');
    }*/





    public function index(Request $request){

         
//poner carteles y demas cosas !!!
    $pacientes=DB::table('pacientes')
    ->join('personas','personas.id', '=', 'pacientes.persona_id')
    ->join('obrasociales','obrasociales.id', '=', 'pacientes.obrasocial_id')
    ->select('personas.nombre' , 'personas.apellido', 'personas.dni', 'obrasociales.nombre as obraNombre', 'pacientes.id')
    ->where('personas.dni', $request->get('dni'))
    ->get();
  
 

        return view('regpacientes.index', compact('pacientes'));
    }

    public function triage($id)

    {
    
    //$pacientesl = Paciente::findOrFail($id);
    $prioridads = Prioridad::pluck('nombre','id')->all();
    
//Hacer la busqueda de la persona con el id del paciente, y traer los datos
  /*  $pacientes=DB::table('pacientes')
    ->join('personas','personas.id', '=', 'pacientes.persona_id')
    ->select('pacientes.id')
    ->where('pacientes.id', $id )
    ->get();
*/ $pacientes = Paciente::where('id', '=', $id)->get()->first();

//    dd($personas);
   $consulta=Consulta::pluck('paciente_id','id')->all(); 
//obtener hora actual y dar formato 
   $now=date('Y-m-d H:i:s');
   $fecha=date('Y-m-d');
       


        return view('regpacientes.triage', compact('pacientes','prioridads','consulta','now', 'fecha'));
    }

   public function store(RegPacientesFormRequest $request){
        
        try {
        $data = $this->getData($request);
    
        $cosulta= Consulta::create($data);

                return redirect()->route('regpacientes.regpaciente.index')
                             ->with('success_message', 'Consulta was successfully updated!');

         } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }
   
public function edit($id){

    $persona = Persona::findOrFail($id);
    $paciente = Paciente::findOrFail($id);
    $obrasocials = Obrasocial::pluck('nombre','id');

    return view('regpacientes.epaciente', compact('paciente','persona','obrasocials'));
    
}

public function update($id, Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            $persona = Persona::findOrFail($id);
            $paciente = Paciente::pluck('id')->all();

            $persona->update($data);
            $paciente->update($data);
            
            return redirect()->route('regpacientes.regpaciente.index')
                             ->with('success_message', 'Persona was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }
  protected function getData(Request $request)
    {
        $rules = [
              'diagnostico' => 'string|min:1|nullable',
            'receta' => 'string|min:1|nullable',
            'fecha' => 'string|min:1|nullable',
            'arribo' => 'string|min:1|nullable',
            'egreso' => 'string|min:1|nullable',
            'tiempo_consulta' => 'string|min:1|nullable',
            'paciente_id' => 'nullable',
            'medico_id' => 'nullable',
            'guardia_id' => 'nullable',
            'prioridad_id' => 'nullable',
            'padecimiento_actual' => 'string|min:1|nullable',

        ];
        
        $data = $request->validate($rules);


        return $data;
    }

    public function pdf(){

        $persona =Persona::all();
        $pdf =PDF::loadView('pdf.persona', compact('persona'));
        return $pdf->downloas('listado.pdf');

    }


}
