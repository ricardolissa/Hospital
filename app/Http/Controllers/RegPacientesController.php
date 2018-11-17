<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Paciente;
use App\Models\Obrasocial;
use App\Http\Controllers\Controller;
use App\Http\Requests\PacientesFormRequest;
use Exception;

class RegPacientesController extends Controller
{

    
    public function index()
    {
        $pacientes = Paciente::with('persona','obrasocial')->paginate(25);

        return view('regpacientes.index');
    }

     public function cpersona()
    {
         
        return view('regpacientes.cpersona');
    
    }

    public function cpaciente()
    {
        
        return view('regpacientes.cpaciente');
    }

   public function storecpersona (){

        $data = $this->getData($request);
            
            Persona::create($data);

            return redirect()->route('regpacientes.regpaciente.cpaciente')
                             ->with('success_message', 'Persona was successfully added!');

    }
   

   public function storecpaciente (){

        $data = $this->getData($request);
            
            Paciente::create($data);

            return redirect()->route('regpacientes.regpaciente.index')
                             ->with('success_message', 'Persona was successfully added!');

    } 
   

}
