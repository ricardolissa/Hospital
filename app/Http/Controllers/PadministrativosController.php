<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PadministrativosFormRequest;
use App\Models\Padministrativo;
use App\Models\Persona;
use DB;
use Exception;
use Illuminate\Http\Request;

class PadministrativosController extends Controller
{

    /**
     * Display a listing of the padministrativos.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $padministrativos = Padministrativo::with('persona')->paginate(25);

        return view('padministrativos.index', compact('padministrativos'));
    }

    /**
     * Show the form for creating a new padministrativo.
     *
     * @return Illuminate\View\View
     */

    public function create(Request $request)
    {
        $personas = DB::table('personas')
            ->select('personas.id', 'personas.nombre', 'personas.apellido', 'personas.dni')
            ->where('personas.dni', $request->get('dni'))
            ->get();

   
        return view('padministrativos.create', compact('personas'));
    }

    /**
     * Store a new padministrativo in the storage.
     *
     * @param App\Http\Requests\PadministrativosFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(PadministrativosFormRequest $request)
    {
        try {
            // dd($request->all());

            $data = $request->getData();
            
            //Padministrativo::create($data);

            //manipulacion de imagen
            
            $data = $request->all();
            if ($archivo = $request->file('foto')) {

                $nombre = $archivo->getClientOriginalName();
                $archivo->move('images', $nombre);
                $data['foto'] = $nombre;
            }
  
           $padministrativos = DB::table('padministrativos')
            ->select('padministrativos.id')
                 
            ->get();
            
 //->orderBy('id', 'desc'), ->oldest() 

            /************* funciona ********/
            if( $padministrativos->isEmpty()){
                
                $data['legajo'] = 1000;
            }else {                
           

           $ultimo=$padministrativos->last();
           $x= $ultimo->id+1000;
           
           $data['legajo'] = $x;
                      
           }
                  

            Padministrativo::create($data);

          


            return redirect()->route('padministrativos.padministrativo.index')
                ->with('success_message', 'Administrativo fue creado con exito!!');

       } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }

    }

    /**
     * Display the specified padministrativo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $padministrativo = Padministrativo::with('persona')->findOrFail($id);

        return view('padministrativos.show', compact('padministrativo'));
    }

    /**
     * Show the form for editing the specified padministrativo.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $padministrativo = Padministrativo::findOrFail($id);
        $personas        = Persona::pluck('nombre', 'id')->all();

        return view('padministrativos.edit', compact('padministrativo', 'personas'));
    }

    /**
     * Update the specified padministrativo in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\PadministrativosFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, PadministrativosFormRequest $request)
    {
        try {

            $data = $request->getData();
            
          
            
            $data = $request->all();
            if ($archivo = $request->file('foto')) {

                $nombre = $archivo->getClientOriginalName();
                $archivo->move('images', $nombre);
                $data['foto'] = $nombre;
            }

            $padministrativo = Padministrativo::findOrFail($id);
            $padministrativo->update($data);

            return redirect()->route('padministrativos.padministrativo.index')
                ->with('success_message', 'Administrativo fue actualizado con exito!!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }

    /**
     * Remove the specified padministrativo from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $padministrativo = Padministrativo::findOrFail($id);
            $padministrativo->delete();

            return redirect()->route('padministrativos.padministrativo.index')
                ->with('success_message', 'Administrativo fue borrado con exito!!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }

    public function indexpad(Request $request)
    {

        $dni = $request->get('dni');

        $personas = Persona::orderBy('id', 'DESC')
            ->dni($dni)
            ->paginate(4);

        return view('padministrativos.indexpad', compact('personas'));
    }

    protected function getData(Request $request)
    {
        $rules = [
            'persona_id' => 'string|min:1|nullable',
            'foto'       => 'string|min:1|nullable',
            'legajo'     => 'string|min:1|nullable',

        ];

        $data = $request->validate($rules);

        return $data;
    }

}
