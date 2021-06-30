<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegPacientesFormRequest;
use App\Models\Consulta;
use App\Models\Obrasocial;
use App\Models\Paciente;
use App\Models\Persona;
use App\Models\Prioridad;
use DB;
use Exception;
use Illuminate\Http\Request;

class RegPacientesController extends Controller
{

    // no deja entrar a la pagina si no esta logueado.
    /* public function __construct()
    {
    $this->middleware('auth');
    }*/

    public function index(Request $request)
    {

//poner carteles y demas cosas !!!
        $pacientes = DB::table('pacientes')
            ->join('personas', 'personas.id', '=', 'pacientes.persona_id')
            ->join('obrasociales', 'obrasociales.id', '=', 'pacientes.obrasocial_id')
            ->select('personas.nombre', 'personas.apellido', 'personas.dni', 'obrasociales.nombre as obraNombre', 'pacientes.id')
            ->where('personas.dni', $request->get('dni'))
            ->get();

        return view('regpacientes.index', compact('pacientes'));
    }

    public function triage($id)
    {

        //$pacientesl = Paciente::findOrFail($id);
        $prioridads = Prioridad::pluck('nombre', 'id')->all();

//Hacer la busqueda de la persona con el id del paciente, y traer los datos
        /*  $pacientes=DB::table('pacientes')
        ->join('personas','personas.id', '=', 'pacientes.persona_id')
        ->select('pacientes.id')
        ->where('pacientes.id', $id )
        ->get();
         */$pacientes = Paciente::where('id', '=', $id)->get()->first();

//    dd($personas);
        $consulta = Consulta::pluck('paciente_id', 'id')->all();
//obtener hora actual y dar formato
        $now   = date('Y-m-d H:i:s');
        $fecha = date('Y-m-d');

        return view('regpacientes.triage', compact('pacientes', 'prioridads', 'consulta', 'now', 'fecha'));
    }

    public function store(RegPacientesFormRequest $request)
    {

        //   try {

        $fecha = $request->fecha;

        $guardia = DB::table('guardias')
            ->select('guardias.id')
            ->where('guardias.fecha', '=', $fecha)
            ->get()
            ->first();

        $data = $this->getData($request);

        $consulta = Consulta::create($data);

        $consulta->guardia_id = $guardia->id;
        $consulta->save();

        return redirect()->route('regpacientes.regpaciente.index')
            ->with('success_message', 'Consulta fue actualizada con exito!!');

    } /* catch (Exception $exception) {

    return back()->withInput()
    ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
    }
    }*/

    public function edit($id)
    {

        $persona     = Persona::findOrFail($id);
        $paciente    = Paciente::findOrFail($id);
        $obrasocials = Obrasocial::pluck('nombre', 'id');

        return view('regpacientes.epaciente', compact('paciente', 'persona', 'obrasocials'));

    }

    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $persona  = Persona::findOrFail($id);
            $paciente = Paciente::pluck('id')->all();

            $persona->update($data);
            $paciente->update($data);

            return redirect()->route('regpacientes.regpaciente.index')
                ->with('success_message', 'Paciente fue actualizada con exito!!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }
    protected function getData(Request $request)
    {
        $rules = [
            'diagnostico'         => 'string|min:1|nullable',
            'receta'              => 'string|min:1|nullable',
            'fecha'               => 'string|min:1|nullable',
            'arribo'              => 'string|min:1|nullable',
            'egreso'              => 'string|min:1|nullable',
            'tiempo_consulta'     => 'string|min:1|nullable',
            'paciente_id'         => 'nullable',
            'medico_id'           => 'nullable',
            'guardia_id'          => 'nullable',
            'prioridad_id'        => 'nullable',
            'padecimiento_actual' => 'string|min:1|nullable',

            'nombre'              => 'string|min:1|nullable',
            'apellido'            => 'string|min:1|nullable',
            'dni'                 => 'string|min:1|nullable',
            'email'               => 'nullable',
            'fecha_nacimiento'    => 'string|min:1|nullable',
            'edad'                => 'string|min:1|nullable',
            'telefono1'           => 'string|min:1|nullable',

        ];

        $data = $request->validate($rules);

        return $data;
    }

    public function pdf()
    {

        $persona = Persona::all();
        $pdf     = PDF::loadView('pdf.persona', compact('persona'));
        return $pdf->downloas('listado.pdf');

    }

    public function createPersona()
    {

        // $personas    = Persona::all();
        // $obrasocials = Obrasocial::all();

        return view('regpacientes.createPersona');
    }

    public function storePersona(Request $request)
    {
     //   try {

            $data = $this->getData($request);
//dd($request->dni);
  //          dd($data,'$data->dni');
            Persona::create($data);

/********* 29/06 hay que pasar el id de la persona a la direccion
    createPaciente/{id}
    *************************************************/
//redirigir si esta logeado
            /*if(Auth::guard('admin')->login($user)){

            return redirect('/regpacientes');

            }*/
            return redirect()->route('regpacientes.regpaciente.index')//,compact($pesona_id))
                ->with('success_message', 'Persona fue actualizada con exito!!');

  /*      } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.!']);
        }
   */ }

    public function createPaciente($id)
    {

        $personas = Persona::findOrFail($id);

        $obrasocials = Obrasocial::pluck('nombre', 'id')->all();

        return view('regpacientes.createPaciente', compact('obrasocials', 'personas'));
    }

    public function storePaciente(Request $request)
    {
//try {

        $data = $this->getData($request);
//dd($request);
        Paciente::create($data);

//redirigir si esta logeado
        /*if(Auth::guard('admin')->login($user)){

        return redirect('/regpacientes');

        }*/
        return redirect()->route('regpacientes.regpaciente.index')
            ->with('success_message', 'Persona fue actualizada con exito!!');

/*} catch (Exception $exception) {

return back()->withInput()
->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.!']);
}*/
    }

}
