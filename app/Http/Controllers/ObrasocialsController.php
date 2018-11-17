<?php

namespace App\Http\Controllers;

use App\Models\Obrasocial;
use App\Http\Controllers\Controller;
use App\Http\Requests\ObrasocialsFormRequest;
use Exception;

class ObrasocialsController extends Controller
{

    /**
     * Display a listing of the obrasocials.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $obrasocials = Obrasocial::paginate(25);

        return view('obrasocials.index', compact('obrasocials'));
    }

    /**
     * Show the form for creating a new obrasocial.
     *
     * @return Illuminate\View\View
     */
    public function create()
    {
        
        
        return view('obrasocials.create');
    }

    /**
     * Store a new obrasocial in the storage.
     *
     * @param App\Http\Requests\ObrasocialsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function store(ObrasocialsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            Obrasocial::create($data);

            return redirect()->route('obrasocials.obrasocial.index')
                             ->with('success_message', 'Obrasocial was successfully added!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }

    /**
     * Display the specified obrasocial.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function show($id)
    {
        $obrasocial = Obrasocial::findOrFail($id);

        return view('obrasocials.show', compact('obrasocial'));
    }

    /**
     * Show the form for editing the specified obrasocial.
     *
     * @param int $id
     *
     * @return Illuminate\View\View
     */
    public function edit($id)
    {
        $obrasocial = Obrasocial::findOrFail($id);
        

        return view('obrasocials.edit', compact('obrasocial'));
    }

    /**
     * Update the specified obrasocial in the storage.
     *
     * @param  int $id
     * @param App\Http\Requests\ObrasocialsFormRequest $request
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function update($id, ObrasocialsFormRequest $request)
    {
        try {
            
            $data = $request->getData();
            
            $obrasocial = Obrasocial::findOrFail($id);
            $obrasocial->update($data);

            return redirect()->route('obrasocials.obrasocial.index')
                             ->with('success_message', 'Obrasocial was successfully updated!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }        
    }

    /**
     * Remove the specified obrasocial from the storage.
     *
     * @param  int $id
     *
     * @return Illuminate\Http\RedirectResponse | Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $obrasocial = Obrasocial::findOrFail($id);
            $obrasocial->delete();

            return redirect()->route('obrasocials.obrasocial.index')
                             ->with('success_message', 'Obrasocial was successfully deleted!');

        } catch (Exception $exception) {

            return back()->withInput()
                         ->withErrors(['unexpected_error' => 'Unexpected error occurred while trying to process your request!']);
        }
    }



}
