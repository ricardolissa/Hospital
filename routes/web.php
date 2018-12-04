<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('pdf','ReportController@generar');

//prueba de controlador
Route::group(
[
    'prefix' => 'regpacientes',
], function () {

    Route::get('/', 'RegPacientesController@index')
         ->name('regpacientes.regpaciente.index');
         
    Route::get('/paciente', 'RegPacientesController@cpaciente')
         ->name('regpacientes.regpaciente.cpaciente');
    
    Route::post('/', 'RegPacientesController@store')
         ->name('regpacientes.regpaciente.store');
             
    Route::post('/bpersona', 'RegPacientesController@bpersona')
         ->name('regpacientes.regpaciente.bpersona');

    Route::get('/bpersona/{persona}','RegPacientesController@edit')
         ->name('regpacientes.regpaciente.edit')
         ->where('id', '[0-9]+');

    Route::put('bpersona/{persona}', 'RegPacientesController@update')
        ->name('regpacientes.regpaciente.update')
        ->where('id', '[0-9]+');

    Route::get('/pdf', 'RegPacientesController@pdf')
         ->name('regpacientes.regpaciente.pdf');
        
});


Route::group(
[
    'prefix' => 'login',
],
    function (){
    Route::get('/', 'LoginController@index')
    ->name('login.login.blade');    

});

Route::group(
[
    'prefix' => 'personas',
], function () {

    Route::get('/', 'PersonasController@index')
         ->name('personas.persona.index');

    Route::get('/create','PersonasController@create')
         ->name('personas.persona.create');

    Route::get('/show/{persona}','PersonasController@show')
         ->name('personas.persona.show')
         ->where('id', '[0-9]+');

    Route::get('/{persona}/edit','PersonasController@edit')
         ->name('personas.persona.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'PersonasController@store')
         ->name('personas.persona.store');
               
    Route::put('persona/{persona}', 'PersonasController@update')
         ->name('personas.persona.update')
         ->where('id', '[0-9]+');

    Route::delete('/persona/{persona}','PersonasController@destroy')
         ->name('personas.persona.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'telefonos',
], function () {

    Route::get('/', 'TelefonosController@index')
         ->name('telefonos.telefono.index');

    Route::get('/create','TelefonosController@create')
         ->name('telefonos.telefono.create');

    Route::get('/show/{telefono}','TelefonosController@show')
         ->name('telefonos.telefono.show')
         ->where('id', '[0-9]+');

    Route::get('/{telefono}/edit','TelefonosController@edit')
         ->name('telefonos.telefono.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'TelefonosController@store')
         ->name('telefonos.telefono.store');
               
    Route::put('telefono/{telefono}', 'TelefonosController@update')
         ->name('telefonos.telefono.update')
         ->where('id', '[0-9]+');

    Route::delete('/telefono/{telefono}','TelefonosController@destroy')
         ->name('telefonos.telefono.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'obrasocials',
], function () {

    Route::get('/', 'ObrasocialsController@index')
         ->name('obrasocials.obrasocial.index');

    Route::get('/create','ObrasocialsController@create')
         ->name('obrasocials.obrasocial.create');

    Route::get('/show/{obrasocial}','ObrasocialsController@show')
         ->name('obrasocials.obrasocial.show')
         ->where('id', '[0-9]+');

    Route::get('/{obrasocial}/edit','ObrasocialsController@edit')
         ->name('obrasocials.obrasocial.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'ObrasocialsController@store')
         ->name('obrasocials.obrasocial.store');
               
    Route::put('obrasocial/{obrasocial}', 'ObrasocialsController@update')
         ->name('obrasocials.obrasocial.update')
         ->where('id', '[0-9]+');

    Route::delete('/obrasocial/{obrasocial}','ObrasocialsController@destroy')
         ->name('obrasocials.obrasocial.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'pacientes',
], function () {

    Route::get('/', 'PacientesController@index')
         ->name('pacientes.paciente.index');

    Route::get('/create','PacientesController@create')
         ->name('pacientes.paciente.create');

    Route::get('/show/{paciente}','PacientesController@show')
         ->name('pacientes.paciente.show')
         ->where('id', '[0-9]+');

    Route::get('/{paciente}/edit','PacientesController@edit')
         ->name('pacientes.paciente.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'PacientesController@store')
         ->name('pacientes.paciente.store');
               
    Route::put('paciente/{paciente}', 'PacientesController@update')
         ->name('pacientes.paciente.update')
         ->where('id', '[0-9]+');

    Route::delete('/paciente/{paciente}','PacientesController@destroy')
         ->name('pacientes.paciente.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'padministrativos',
], function () {

    Route::get('/', 'PadministrativosController@index')
         ->name('padministrativos.padministrativo.index');

    Route::get('/create','PadministrativosController@create')
         ->name('padministrativos.padministrativo.create');

    Route::get('/show/{padministrativo}','PadministrativosController@show')
         ->name('padministrativos.padministrativo.show')
         ->where('id', '[0-9]+');

    Route::get('/{padministrativo}/edit','PadministrativosController@edit')
         ->name('padministrativos.padministrativo.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'PadministrativosController@store')
         ->name('padministrativos.padministrativo.store');
               
    Route::put('padministrativo/{padministrativo}', 'PadministrativosController@update')
         ->name('padministrativos.padministrativo.update')
         ->where('id', '[0-9]+');

    Route::delete('/padministrativo/{padministrativo}','PadministrativosController@destroy')
         ->name('padministrativos.padministrativo.destroy')
         ->where('id', '[0-9]+');

    Route::get('/', 'PadministrativosController@indexpad')
         ->name('padministrativos.padministrativo.indexpad');

});

Route::group(
[
    'prefix' => 'medicos',
], function () {

    Route::get('/', 'MedicosController@index')
         ->name('medicos.medicos.index');

    Route::get('/create','MedicosController@create')
         ->name('medicos.medicos.create');

    Route::get('/show/{medicos}','MedicosController@show')
         ->name('medicos.medicos.show')
         ->where('id', '[0-9]+');

    Route::get('/{medicos}/edit','MedicosController@edit')
         ->name('medicos.medicos.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'MedicosController@store')
         ->name('medicos.medicos.store');
               
    Route::put('medicos/{medicos}', 'MedicosController@update')
         ->name('medicos.medicos.update')
         ->where('id', '[0-9]+');

    Route::delete('/medicos/{medicos}','MedicosController@destroy')
         ->name('medicos.medicos.destroy')
         ->where('id', '[0-9]+');

    Route::get('/indexmed', 'MedicosController@indexmed')
         ->name('medicos.medicos.indexmed');
});

Route::group(
[
    'prefix' => 'especialidads',
], function () {

    Route::get('/', 'EspecialidadsController@index')
         ->name('especialidads.especialidad.index');

    Route::get('/create','EspecialidadsController@create')
         ->name('especialidads.especialidad.create');

    Route::get('/show/{especialidad}','EspecialidadsController@show')
         ->name('especialidads.especialidad.show')
         ->where('id', '[0-9]+');

    Route::get('/{especialidad}/edit','EspecialidadsController@edit')
         ->name('especialidads.especialidad.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'EspecialidadsController@store')
         ->name('especialidads.especialidad.store');
               
    Route::put('especialidad/{especialidad}', 'EspecialidadsController@update')
         ->name('especialidads.especialidad.update')
         ->where('id', '[0-9]+');

    Route::delete('/especialidad/{especialidad}','EspecialidadsController@destroy')
         ->name('especialidads.especialidad.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'guardias',
], function () {

    Route::get('/', 'GuardiasController@index')
         ->name('guardias.guardia.index');

    Route::get('/create','GuardiasController@create')
         ->name('guardias.guardia.create');

    Route::get('/show/{guardia}','GuardiasController@show')
         ->name('guardias.guardia.show')
         ->where('id', '[0-9]+');

    Route::get('/{guardia}/edit','GuardiasController@edit')
         ->name('guardias.guardia.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'GuardiasController@store')
         ->name('guardias.guardia.store');
               
    Route::put('guardia/{guardia}', 'GuardiasController@update')
         ->name('guardias.guardia.update')
         ->where('id', '[0-9]+');

    Route::delete('/guardia/{guardia}','GuardiasController@destroy')
         ->name('guardias.guardia.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'prioridads',
], function () {

    Route::get('/', 'PrioridadsController@index')
         ->name('prioridads.prioridad.index');

    Route::get('/create','PrioridadsController@create')
         ->name('prioridads.prioridad.create');

    Route::get('/show/{prioridad}','PrioridadsController@show')
         ->name('prioridads.prioridad.show')
         ->where('id', '[0-9]+');

    Route::get('/{prioridad}/edit','PrioridadsController@edit')
         ->name('prioridads.prioridad.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'PrioridadsController@store')
         ->name('prioridads.prioridad.store');
               
    Route::put('prioridad/{prioridad}', 'PrioridadsController@update')
         ->name('prioridads.prioridad.update')
         ->where('id', '[0-9]+');

    Route::delete('/prioridad/{prioridad}','PrioridadsController@destroy')
         ->name('prioridads.prioridad.destroy')
         ->where('id', '[0-9]+');

});

Route::group(
[
    'prefix' => 'consultas',
], function () {

    Route::get('/', 'ConsultasController@index')
         ->name('consultas.consulta.index');

    Route::get('/create','ConsultasController@create')
         ->name('consultas.consulta.create');

    Route::get('/show/{consulta}','ConsultasController@show')
         ->name('consultas.consulta.show')
         ->where('id', '[0-9]+');

    Route::get('/{consulta}/edit','ConsultasController@edit')
         ->name('consultas.consulta.edit')
         ->where('id', '[0-9]+');

    Route::post('/', 'ConsultasController@store')
         ->name('consultas.consulta.store');
               
    Route::put('consulta/{consulta}', 'ConsultasController@update')
         ->name('consultas.consulta.update')
         ->where('id', '[0-9]+');

    Route::delete('/consulta/{consulta}','ConsultasController@destroy')
         ->name('consultas.consulta.destroy')
         ->where('id', '[0-9]+');

});
