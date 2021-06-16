<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use App\Models\Guardia;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Prioridad;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use DB;

class ConsultasController extends Controller
{

    /**
     * Display a listing of the consultas.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $consultasObjects = Consulta::with('paciente', 'medico', 'guardia', 'prioridad')->paginate(25);

        return view('consultas.index', compact('consultasObjects'));
    }

    /**
     * Show the form for creating a new consultas.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        $pacientes  = Paciente::pluck('antecedentes_familiares', 'id')->all();
        $medicos    = Medico::pluck('foto', 'id')->all();
        $guardias   = Guardia::pluck('id', 'id')->all();
        $prioridads = Prioridad::pluck('nombre', 'id')->all();


        return view('consultas.create', compact('pacientes', 'medicos', 'guardias', 'prioridads'));
    }

    /**
     * Store a new consultas in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $fecha= $request->fecha;
            $data = $this->getData($request);

            $consulta= Consulta::create($data);

            $consulta->guardia()->sync();


            return redirect()->route('consultas.consulta.index')
                ->with('success_message', 'Consulta fue creada con exito!!.');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }

    /**
     * Display the specified consultas.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $consultas = Consulta::with('paciente', 'medico', 'guardia', 'prioridad')->findOrFail($id);

        return view('consultas.show', compact('consultas'));
    }

    /**
     * Show the form for editing the specified consultas.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $consultas  = Consulta::findOrFail($id);
        $pacientes  = Paciente::pluck('antecedentes_familiares', 'id')->all();
        $medicos    = Medico::pluck('foto', 'id')->all();
        $guardias   = Guardia::pluck('id', 'id')->all();
        $prioridads = Prioridad::pluck('nombre', 'id')->all();

        return view('consultas.edit', compact('consultas', 'pacientes', 'medicos', 'guardias', 'prioridads'));
    }

    /**
     * Update the specified consultas in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $consultas = Consulta::findOrFail($id);
            $consultas->update($data);

            return redirect()->route('consultas.consulta.index')
                ->with('success_message', 'Consulta fue actualizada con exito!!.');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud..']);
        }
    }

    /**
     * Remove the specified consultas from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $consultas = Consulta::findOrFail($id);
            $consultas->delete();

            return redirect()->route('consultas.consulta.index')
                ->with('success_message', 'Consulta fue borrada con exito!!.');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }

    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
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
            'atendido'            => 'string|min:1|nullable',
        ];

        $data = $request->validate($rules);

        return $data;
    }

    protected function ConsultaMedico()
    {

        $consultas = Consulta::with('paciente')->orderBy('prioridad_id')->paginate(25);

        return view('consultas.consultamedico', compact('consultas'));

    }

    protected function ConsultaMedicoEdit($id)
    {

        $consulta   = Consulta::findOrFail($id);
        $pacientes  = Paciente::pluck('id', 'id')->all();
        $medicos    = Medico::pluck('id', 'id')->all();
        $guardias   = Guardia::pluck('id', 'id')->all();
        $prioridads = Prioridad::pluck('nombre', 'id')->all();

        return view('consultas.consultamedicoedit', compact('consulta', 'pacientes', 'medicos', 'guardias', 'prioridads'));

    }

    public function ConsultaMedicoUpdate($id, Request $request)
    {
        //actualiza datos despues que termina la consulta, egreso, tiempo de atencion, y faltantes
        //try {

        $tconsulta      = Consulta::findOrFail($id);
        $data           = $this->getData($request);
        $data['egreso'] = Carbon::now();
        //faltan datos para realizar la resta!!!!! no aparece el tiempo de arribo.
        //$data['padecimiento_actual']='esto se cambio';
        //$data['tiempo_consulta']=date('H:i:s');

        //utilizacion de Carbon para manipular horarios
        //  $tconsulta= Consulta::findOrFail($id);
        $arribo = $tconsulta->arribo; //->format('h:i:s');
        //dd($arribo);
        $egreso = $data['egreso']; //->format('h:i:s');
        //dd($egreso);

        $tiempoconsulta = $arribo->diff($egreso);
        $h              = $tiempoconsulta->h;
        $i              = $tiempoconsulta->i;
        $s              = $tiempoconsulta->s;
        $diferencia     = Carbon::createFromTime($h, $i, $s);
        // dd($diferencia);
        //dd($a);
        //dd($tiempoconsulta)); //devuelve el intervalo con los date en cero

/// prueba
        /*$year='2020';
        $month='1';
        $day='5';
        $tz='00:00:00';
        $fecha1 = Carbon::createFromDate($year, $month, $day);

        //dd($fecha1);
        $ff=Carbon::create('2020','3','23','00','4','5');

        $f2=Carbon::create('2020','3','22','23','4','5');

        $dife= $ff->diff($f2);
        dd($dife);
         */
        $data['tiempo_consulta'] = $diferencia;
        $data['atendido']        = 'SI';

        //dd($data['tiempo_consulta']);

/*          al querer actualizar
ERROR     preg_match() expects parameter 2 to be string, array given
espera 2 parametros y recibe 1

 */

        $consultas = Consulta::findOrFail($id);
        $consultas->update($data);

        return redirect()->route('consultas.consulta.index')
            ->with('success_message', 'Consulta fue actualizada con exito!!.');

        //}
        //catch (Exception $exception) {

        //  return back()->withInput()
        //             ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request.']);
        //}
    }

    public function calculoEstimadoConsulta(){

/**********************************************************************************************/
/** Realiza la consulta a la base de datos, obteniendo las consultas segun las condiciones **/
$consultas =  Consulta::where('arribo', '<=','2021-06-15 20:00:00') //'2021-04-11 00:01:01')
                ->where('consultas.atendido', '=' ,'SI')
                //->where('consultas.prioridad_id','=', 4)        
                ->get();

//dd($consultas);
/** como es una coleccion se debe posicionar en cada uno de los elementos de la mismas, es
tipo DateTime -> tenemos que dar el formato de hora que es lo que necesitamos */

$cadena=0;
//Realiza la suma de las horas
for ($i=0; $i < count($consultas); $i++) { 
    
    $cadena += strtotime($consultas[$i]->tiempo_consulta) - strtotime("TODAY");

}

//Promedio de horas
$resultado = $cadena / count($consultas);

//muestra la suma()
//echo gmdate("H:i:s", $cadena);

$tiempo_espera= gmdate("H:i:s", $resultado);

$suma=$resultado + $resultado;

$tiempofinal= gmdate("H:i:s", $suma );
/*
dd('$resultado promedio = '. $resultado . ' tiempo de espera =  ' . $tiempo_espera  . ' suma = ' . $suma  . ' resultado de suma = ' . $tiempofinal); 
*/
//$arribo = strtotime($consultas[0]->arribo)+$resultado;
//dd($arribo);



//$arribo = gmdate("H:i:s", $arribo );
//dd($arribo);


$consultasObjects =  Consulta::with('paciente')
                ->where('arribo', '<=','2021-06-15 20:00:00')
                ->where('consultas.atendido', '=' ,'SI')
               // ->where('consultas.prioridad_id','=', 4)       
                ->get();

/*$horaE ='20:00:00';
$consultasObjects['horaE']=$horaE;
dd($consultasObjects);
*/
foreach($$consultasObjects as &$clinic) {

   $consultasObject['horaE']=$horaE;
    }

dd($consultasObjects);

/////
for ($i=0; $i < count($consultasObjects); $i++) { 
    
    $horaEstimadas = gmdate("H:i:s", strtotime($consultasObjects[$i]->arribo) + $resultado);
    

   

}
dd($consultasObjects);
//$collection = collect( $horaEstimadas);
//dd($collection);
//hora estimada de atencion

//AutoReload => https://www.youtube.com/watch?v=Z0QRNeUYsMM


return view('consultas.tiempodeconsulta', compact('consultasObjects','tiempo_espera','horaEstimadas','collection'));

//dd($r);

/*
foreach($consultas AS $tiempo)
{
    $resultado += strtotime($tiempo) - strtotime("TODAY") ;
}
*/
//$r = $date;
//dd($r);


/*
$resultado=0;
foreach($consultas AS $tiempo)
{
    $resultado += strtotime($tiempo) - strtotime("TODAY") . "\n";
}

$resultado = $resultado / count($consultas);

echo gmdate("H:i:s", $resultado);

*/  

//$date1 = $consultas[0]->tiempo_consulta->format('H:m:s');
//$date2 = $consultas[1]->tiempo_consulta->format('H:m:s');


//dd($consultas[0]->tiempo_consulta->format('H:m:s'));

/* una vez obtenido los tiempos, utilizamos la clase carbon para transformar el dato string de tiempo y realizar la diferencia entre los datos, ademas debemos asignar nuevamente el format al string para poder visualizarlo. */

//$diff = (Carbon::parse($date1)->diff(Carbon::parse($date2)))->format('%H:%m:%s');


//dd($diff);

//return view('consultas.tiempodeconsulta', compact('consultas','diff'));

/*************************************************************************************************/

/*
calculo del promedio del tiempo estimado en segudos = 
tiempo de consulta  = H*3600+m*60+s
promedio de tiempoconsulta = x segundos / (n tiempos)
tiempo estimado = promedio tiempo de consulta + la llegada del paciente


Arribo  + tiempo de espera = tiempo a de atencion

*/



//$ar = $consultasObjects[0]->arribo->format('H:m:s');

//$dc = (Carbon::parse($ar)??add?? (Carbon::parse($diff)));
//$horax = Carbon::createFromFormat($consultasObjects[0]->arribo )->addDay()->toDateTimeString();
//dd($dc);

//dd($consultasObjects);



// primero el calculo de los que fueron atendidos
/*$actual = Carbon::now();

     $consultas = DB::table('consultas')
        ->select ('consultas.tiempo_consulta')
      //  ->avg('consultas.tiempo_consulta')
        ->where('consultas.atendido', '=' ,'SI')
        ->where('consultas.prioridad_id','=', 4)
        ->get();

// promedio
     //   sumar= tiempo_consulta / por la cantidad de consultas
 //->tiempo_consulta->h;   

$date1 = $consultas[0];
dd($date1);

dd($actual->format('H:i:s'));
*/
//$c = Consulta::whereDay('arribo', '10')->get();
//$c= Consulta::where('prioridad_id','=', 4)->avg('paciente_id');

/*$avagTime = DB::table('consultas')
    ->selectRaw('AVG(TIME_TO_SEC(tiempo_consulta) - TIME_TO_SEC(tiempo_consulta))')
    ->get();
*/


//$c= Consulta::where('consultas.prioridad_id','=', 4)->avg(UNIX_TIMESTAMP('tiempo_consulta'), '%e %b %Y');



//dd($d);
/************************** Realiza una resta *******************
$x = $consultas[0]; //->tiempo_consulta->h;
$x = $x->tiempo_consulta;
$z = $consultas[1];
$z = $z->tiempo_consulta;

$w = date('H:i:s', strtotime($x));
$y = date('H:i:s', strtotime($z));

$date1 = Carbon::parse($w);
$date2 = Carbon::parse($y);

$result = $date1->diff($date2);*/

//dd($w, $y, $date1, $date2, $result);
/***************************************************************/
/*
$hora1 = Carbon::parse('00:00:05');
$hora2 = Carbon::parse('00:00:10');
$result1 = $hora2->diff($hora1);

$r = $w / $y;
dd($r);
*/

//$date->format('H:i:s');
// $s = Carbon::createFromTime($h, $i, $s);



   //    $consultas->each(function($consultas){
     //           $consultas->tiempo_consulta;
       //     } );
       
   




    }

}
