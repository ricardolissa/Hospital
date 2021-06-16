<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Role;
use App\Http\Requests\UsersFormRequest;
use App\Http\Controllers\Controller;
use Exception;


class UsersController extends Controller
{

    // no deja entrar a la pagina si no esta logueado.
    /* public function __construct()
    {
        $this->middleware('auth');
    }*/












    /**
     * Display a listing of the users.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
    
        $users = User::with('role')->paginate(25);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
      
        $roles = Role::pluck('name','id')->all();
        
        return view('users.create', compact('roles'));
    }

    /**
     * Store a new user in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(UsersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            User::create($data);

            return redirect()->route('users.user.index')
                             ->with('success_message', 'Se a creado el Usuario!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }
    /**
     * Display the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
  
    public function show($id)
    {
        $user = User::with('role')->findOrFail($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();

        return view('users.edit', compact('user','roles'));
    }

    /**
     * Update the specified user in the storage.
     *
     * @param  int $id
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, UsersFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $user = User::findOrFail($id);
            $user->update($data);

            return redirect()->route('users.user.index')
                             ->with('success_message', 'El Usuario a sido actualizado!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }        
    }

    /**
     * Remove the specified user from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('users.user.index')
                             ->with('success_message', 'El Usuario ha sido borrado');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Se produjo un error inesperado al intentar procesar su solicitud.']);
        }
    }

    
   
}
