<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegPacientesFormRequest;
use App\Models\Obrasocial;
use App\Models\Paciente;
use App\Models\Persona;
use Exception;
use Illuminate\Http\Request;

class RegPacientesController extends Controller
{

    public function index(){

        return view('regpacientes.index');
    }
 
    public function bpersona(Request $request)
    {
        

       
       $dni = $request->get('dni');
       

       $personas = Persona::orderBy('id','DESC')
                ->dni($dni)
                ->paginate(4);

        //hacer que tire error cuando el input de busqueda esta vacio.


        return view('regpacientes.bpersona', compact('personas'));
    }

    public function cpaciente()
    {
        $personas = Persona::pluck('nombre','id')->all();
        $obrasocials = Obrasocial::pluck('nombre','id')->all();

        return view('regpacientes.cpaciente', compact('personas', 'obrasocials'));
    }

   public function store(RegPacientesFormRequest $request){

        $data = $request->getData();
            
        $persona =Persona::create($data);
// En el caso de una persona que ya se encuentra creada realizar un if para verificar la situacion -
        $paciente = new Paciente();
        $paciente->fill($data);
        $paciente->persona_id = $persona->id; // o $paciente->persona()->associate($persona);
        $paciente->save();


            return redirect()->route('regpacientes.regpaciente.index')
                             ->with('success_message', 'Persona was successfully added!');
                       

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
/*
    public function agregarlista($id){

        $persona->id;
        $this->listadeespera[] = $persona;
    }
*/

    public function pdf(){

        $persona =Persona::all();
        $pdf =PDF::loadView('pdf.persona', compact('persona'));
        return $pdf->downloas('listado.pdf');

    }


}
