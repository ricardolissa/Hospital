<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class VistadmController extends Controller
{
  
  public function index()
    {
        return view('vistadm.admnewpersona');
    }

public function index2(){

    return view('vistadm.admnewpaciente');

}

public function mensaje()
{
return view('vistadm.mensaje');
}

   public function store(Request $request)
    {
        try {
            
            $data = $this->getData($request);
            
            Persona::create($data);

            return redirect()->route('pacientes.paciente.create2')
                             ->with('success_message', 'Persona was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

  public function storepaciente(Request $request)
    {
        try {
            dd($request);
            $data = $request->getDatapaciente();
            
            Paciente::create($data);

            return redirect()->route('vistadm.mensaje')
                             ->with('success_message', 'Paciente was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }


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

protected function getDatapaciente(Request $request)
    {
        $rules = [
           // 'persona_id' => 'integer|nullable',
           // 'obrasocial_id' => 'integer|nullable',
                  'antecedentes_familiares' => 'string|min:1|nullable',
                  'antecedentes_patologico' => 'string|min:1|nullable',
                  'antecedentes_nopatologico' =>'string|min:1|nullable',
                  'padecimiento_actual' => 'string|min:1|nullable',

     
        ];
        
        $data = $request->validate($rules);


        return $data;
    }

}
