<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MedicosFormRequest;
use App\Models\Especialidad;
use App\Models\Medico;
use App\Models\Persona;
use DB;
use Exception;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the medicos.
     *
     * @return Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $medicosObjects = Medico::with('persona')->paginate(25);

        return view('medicos.index', compact('medicosObjects'));
    }

    /**
     * Show the form for creating a new medicos.
     *
     * @return Illuminate\View\View
     */
    public function create(Request $request)
    {

        $personas = DB::table('personas')
            ->select('personas.id', 'personas.nombre', 'personas.apellido', 'personas.dni')
            ->where('personas.dni', $request->get('dni'))
            ->get();

        $especialidades = DB::table('especialidades')
            ->get();

        return view('medicos.create', compact('personas', 'especialidades'));
    }

    /**
     * Store a new medicos in the storage.
     *
     * @param App\Http\Requests\MedicosFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(MedicosFormRequest $request)
    {
        try {

            $data = $request->getData();

            $data = $request->all();
            if ($archivo = $request->file('foto')) {

                $nombre = $archivo->getClientOriginalName();
                $archivo->move('images', $nombre);
                $data['foto'] = $nombre;
            }

            $medicos = DB::table('medicos')
                ->select('medicos.id')
                ->get();

            /************* funciona ********/
            if ($medicos->isEmpty()) {

                $data['legajo'] = 4000;
            } else {

                $ultimo = $medicos->last();
                $x      = $ultimo->id + 4000;

                $data['legajo'] = $x;

            }

            $medicos = Medico::create($data);

            $medicos->especialidades()->sync($data['especialidades']);

            return redirect()->route('medicos.medicos.index')
                ->with('success_message', 'Medico fue creado con exito!!');
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }

    /**
     * Display the specified medicos.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $medicos = Medico::with('persona')->findOrFail($id);

        return view('medicos.show', compact('medicos'));
    }

    /**
     * Show the form for editing the specified medicos.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {

        $medicos  = Medico::findOrFail($id);
        $personas = Persona::findOrFail($medicos->persona_id);
        $especialidades = DB::table('especialidades')
            ->get();

        return view('medicos.edit', compact('medicos', 'personas', 'especialidades'));
    }

    /**
     * Update the specified medicos in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\MedicosFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, MedicosFormRequest $request)
    {
        try {

            $data = $request->getData();

            $data = $request->all();
            if ($archivo = $request->file('foto')) {

                $nombre = $archivo->getClientOriginalName();
                $archivo->move('images', $nombre);
                $data['foto'] = $nombre;
            }
            $medicos = Medico::findOrFail($id);
            $medicos->update($data);

            $medicos->especialidades()->sync($data['especialidades']);
            // $medicos->especialidades()->sync($data['especialidades'],false);

            return redirect()->route('medicos.medicos.index')
                ->with('success_message', 'Medico fue actualizado con exito!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }

    /**
     * Remove the specified medicos from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $medicos = Medico::findOrFail($id);
            $medicos->delete();

            return redirect()->route('medicos.medicos.index')
                ->with('success_message', 'Medico fue borrado con exito!!!');

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }

    public function indexmed()
    {

        $medicosObjects = Medico::with('persona')->paginate(25);
        $id             = 1;
        $especialidad   = Especialidad::findOrFail($id);
        return view('medicos.indexmed', compact('medicosObjects', $especialidad));
    }

}
