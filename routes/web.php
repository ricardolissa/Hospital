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

Route::get('pdf', 'ReportController@generar');

//prueba de controlador
Route::group(
    [
        'prefix' => 'regpacientes',
    ], function () {

        Route::get('/', 'RegPacientesController@index')
            ->name('regpacientes.regpaciente.index');

        Route::get('/triage/{paciente}', 'RegPacientesController@triage')
            ->name('regpacientes.regpaciente.triage')
            ->where('id', '[0-9]+');

        Route::post('/', 'RegPacientesController@store')
            ->name('regpacientes.regpaciente.store');

        Route::post('/bpersona', 'RegPacientesController@bpersona')
            ->name('regpacientes.regpaciente.bpersona');

        Route::get('/bpersona/{persona}', 'RegPacientesController@edit')
            ->name('regpacientes.regpaciente.edit')
            ->where('id', '[0-9]+');

        Route::put('bpersona/{persona}', 'RegPacientesController@update')
            ->name('regpacientes.regpaciente.update')
            ->where('id', '[0-9]+');

        Route::get('/pdf', 'RegPacientesController@pdf')
            ->name('regpacientes.regpaciente.pdf');

//nuevos
        Route::get('/createPersona', 'RegPacientesController@createPersona')
            ->name('regpacientes.regpaciente.createPersona');

        Route::post('/storePersona', 'RegPacientesController@storePersona')
            ->name('regpacientes.regpaciente.storePersona');

        Route::get('/{id}/createPaciente', 'RegPacientesController@createPaciente')
            ->name('regpacientes.regpaciente.createPaciente')
            ->where('id', '[0-9]+');

 


        Route::post('/storePaciente', 'RegPacientesController@storePaciente')
            ->name('regpacientes.regpaciente.storePaciente');


    });

Route::group(
    [
        'prefix' => 'personas',
    ], function () {

        Route::get('/', 'PersonasController@index')
            ->name('personas.persona.index');

        Route::get('/create', 'PersonasController@create')
            ->name('personas.persona.create');

        Route::get('/show/{persona}', 'PersonasController@show')
            ->name('personas.persona.show')
            ->where('id', '[0-9]+');

        Route::get('/{persona}/edit', 'PersonasController@edit')
            ->name('personas.persona.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'PersonasController@store')
            ->name('personas.persona.store');

        Route::put('persona/{persona}', 'PersonasController@update')
            ->name('personas.persona.update')
            ->where('id', '[0-9]+');

        Route::delete('/persona/{persona}', 'PersonasController@destroy')
            ->name('personas.persona.destroy')
            ->where('id', '[0-9]+');

    });

Route::group(
    [
        'prefix' => 'obrasocials',
    ], function () {

        Route::get('/', 'ObrasocialsController@index')
            ->name('obrasocials.obrasocial.index');

        Route::get('/create', 'ObrasocialsController@create')
            ->name('obrasocials.obrasocial.create');

        Route::get('/show/{obrasocial}', 'ObrasocialsController@show')
            ->name('obrasocials.obrasocial.show')
            ->where('id', '[0-9]+');

        Route::get('/{obrasocial}/edit', 'ObrasocialsController@edit')
            ->name('obrasocials.obrasocial.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'ObrasocialsController@store')
            ->name('obrasocials.obrasocial.store');

        Route::put('obrasocial/{obrasocial}', 'ObrasocialsController@update')
            ->name('obrasocials.obrasocial.update')
            ->where('id', '[0-9]+');

        Route::delete('/obrasocial/{obrasocial}', 'ObrasocialsController@destroy')
            ->name('obrasocials.obrasocial.destroy')
            ->where('id', '[0-9]+');

    });

Route::group(
    [
        'prefix' => 'pacientes',
    ], function () {

        Route::get('/', 'PacientesController@index')
            ->name('pacientes.paciente.index');

        Route::get('/create', 'PacientesController@create')
            ->name('pacientes.paciente.create');

        Route::get('/create2', 'PacientesController@create2')
            ->name('pacientes.paciente.create2');

        Route::post('/store2', 'PacientesController@store2')
            ->name('pacientes.paciente.store2');

        Route::get('/show/{paciente}', 'PacientesController@show')
            ->name('pacientes.paciente.show')
            ->where('id', '[0-9]+');

        Route::get('/{paciente}/edit', 'PacientesController@edit')
            ->name('pacientes.paciente.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'PacientesController@store')
            ->name('pacientes.paciente.store');

        Route::put('paciente/{paciente}', 'PacientesController@update')
            ->name('pacientes.paciente.update')
            ->where('id', '[0-9]+');

        Route::delete('/paciente/{paciente}', 'PacientesController@destroy')
            ->name('pacientes.paciente.destroy')
            ->where('id', '[0-9]+');

    });

Route::group(
    [
        'prefix' => 'padministrativos',
    ], function () {

        Route::get('/', 'PadministrativosController@index')
            ->name('padministrativos.padministrativo.index');

        Route::get('/create', 'PadministrativosController@create')
            ->name('padministrativos.padministrativo.create');

        Route::get('/show/{padministrativo}', 'PadministrativosController@show')
            ->name('padministrativos.padministrativo.show')
            ->where('id', '[0-9]+');

        Route::get('/{padministrativo}/edit', 'PadministrativosController@edit')
            ->name('padministrativos.padministrativo.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'PadministrativosController@store')
            ->name('padministrativos.padministrativo.store');

        Route::put('padministrativo/{padministrativo}', 'PadministrativosController@update')
            ->name('padministrativos.padministrativo.update')
            ->where('id', '[0-9]+');

        Route::delete('/padministrativo/{padministrativo}', 'PadministrativosController@destroy')
            ->name('padministrativos.padministrativo.destroy')
            ->where('id', '[0-9]+');

        Route::get('/indexpad', 'PadministrativosController@indexpad')
            ->name('padministrativos.padministrativo.indexpad');

    });

Route::group(
    [
        'prefix' => 'medicos',
    ], function () {

        Route::get('/', 'MedicosController@index')
            ->name('medicos.medicos.index');

        Route::get('/create', 'MedicosController@create')
            ->name('medicos.medicos.create');

        Route::get('/show/{medicos}', 'MedicosController@show')
            ->name('medicos.medicos.show')
            ->where('id', '[0-9]+');

        Route::get('/{medicos}/edit', 'MedicosController@edit')
            ->name('medicos.medicos.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'MedicosController@store')
            ->name('medicos.medicos.store');

        Route::put('medicos/{medicos}', 'MedicosController@update')
            ->name('medicos.medicos.update')
            ->where('id', '[0-9]+');

        Route::delete('/medicos/{medicos}', 'MedicosController@destroy')
            ->name('medicos.medicos.destroy')
            ->where('id', '[0-9]+');

        Route::get('/indexmed', 'MedicosController@indexmed')
            ->name('medicos.medicos.indexmed');
    });

Route::group(
    [
        'prefix' => 'especialidades',
    ], function () {

        Route::get('/', 'EspecialidadesController@index')
            ->name('especialidades.especialidad.index');

        Route::get('/create', 'EspecialidadesController@create')
            ->name('especialidades.especialidad.create');

        Route::get('/show/{especialidad}', 'EspecialidadesController@show')
            ->name('especialidades.especialidad.show')
            ->where('id', '[0-9]+');

        Route::get('/{especialidad}/edit', 'EspecialidadesController@edit')
            ->name('especialidades.especialidad.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'EspecialidadesController@store')
            ->name('especialidades.especialidad.store');

        Route::put('especialidad/{especialidad}', 'EspecialidadesController@update')
            ->name('especialidades.especialidad.update')
            ->where('id', '[0-9]+');

        Route::delete('/especialidad/{especialidad}', 'EspecialidadesController@destroy')
            ->name('especialidades.especialidad.destroy')
            ->where('id', '[0-9]+');

    });

Route::group(
    [
        'prefix' => 'guardias',
    ], function () {

        Route::get('/', 'GuardiasController@index')
            ->name('guardias.guardia.index');

        Route::get('/create', 'GuardiasController@create')
            ->name('guardias.guardia.create');

        Route::get('/show/{guardia}', 'GuardiasController@show')
            ->name('guardias.guardia.show')
            ->where('id', '[0-9]+');

        Route::get('/{guardia}/edit', 'GuardiasController@edit')
            ->name('guardias.guardia.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'GuardiasController@store')
            ->name('guardias.guardia.store');

        Route::put('guardia/{guardia}', 'GuardiasController@update')
            ->name('guardias.guardia.update')
            ->where('id', '[0-9]+');

        Route::delete('/guardia/{guardia}', 'GuardiasController@destroy')
            ->name('guardias.guardia.destroy')
            ->where('id', '[0-9]+');

        Route::get('/asignarGuardia', 'GuardiasController@asignarGuardia')
            ->name('guardias.guardia.asignarGuardia');

    });

Route::group(
    [
        'prefix' => 'prioridads',
    ], function () {

        Route::get('/', 'PrioridadsController@index')
            ->name('prioridads.prioridad.index');

        Route::get('/create', 'PrioridadsController@create')
            ->name('prioridads.prioridad.create');

        Route::get('/show/{prioridad}', 'PrioridadsController@show')
            ->name('prioridads.prioridad.show')
            ->where('id', '[0-9]+');

        Route::get('/{prioridad}/edit', 'PrioridadsController@edit')
            ->name('prioridads.prioridad.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'PrioridadsController@store')
            ->name('prioridads.prioridad.store');

        Route::put('prioridad/{prioridad}', 'PrioridadsController@update')
            ->name('prioridads.prioridad.update')
            ->where('id', '[0-9]+');

        Route::delete('/prioridad/{prioridad}', 'PrioridadsController@destroy')
            ->name('prioridads.prioridad.destroy')
            ->where('id', '[0-9]+');

    });

Route::group(
    [
        'prefix' => 'consultas',
    ], function () {

        Route::get('/', 'ConsultasController@index')
            ->name('consultas.consulta.index');

        Route::get('/create', 'ConsultasController@create')
            ->name('consultas.consulta.create');

        Route::get('/show/{consulta}', 'ConsultasController@show')
            ->name('consultas.consulta.show')
            ->where('id', '[0-9]+');

        Route::get('/{consulta}/edit', 'ConsultasController@edit')
            ->name('consultas.consulta.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'ConsultasController@store')
            ->name('consultas.consulta.store');

        Route::put('consulta/{consulta}', 'ConsultasController@update')
            ->name('consultas.consulta.update')
            ->where('id', '[0-9]+');

        Route::delete('/consulta/{consulta}', 'ConsultasController@destroy')
            ->name('consultas.consulta.destroy')
            ->where('id', '[0-9]+');

        Route::get('/consultamedico', 'ConsultasController@ConsultaMedico')
            ->name('consultas.consulta.consultamedico');

        Route::get('/consultamedico/{consulta}/consultamedicoedit', 'ConsultasController@ConsultaMedicoEdit')
            ->name('consultas.consulta.consultamedicoedit')
            ->where('id', '[0-9]+');

        Route::put('consultamedico/{consulta}', 'ConsultasController@ConsultaMedicoUpdate')
            ->name('consultas.consulta.consultamedicoupdate')
            ->where('id', '[0-9]+');

        Route::get('/tiempodeconsulta', 'ConsultasController@calculoEstimadoConsulta')
            ->name('consultas.consulta.tiempodeconsulta');

    });

Route::group(
    [
        'prefix' => 'users',
    ], function () {

        Route::get('/', 'UsersController@index')
            ->name('users.user.index');

        Route::get('/create', 'UsersController@create')
            ->name('users.user.create');

        Route::get('/show/{user}', 'UsersController@show')
            ->name('users.user.show')
            ->where('id', '[0-9]+');

        Route::get('/{user}/edit', 'UsersController@edit')
            ->name('users.user.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'UsersController@store')
            ->name('users.user.store');

        Route::put('user/{user}', 'UsersController@update')
            ->name('users.user.update')
            ->where('id', '[0-9]+');

        Route::delete('/user/{user}', 'UsersController@destroy')
            ->name('users.user.destroy')
            ->where('id', '[0-9]+');

    });

Route::group(
    [
        'prefix' => 'roles',
    ], function () {

        Route::get('/', 'RolesController@index')
            ->name('roles.role.index');

        Route::get('/create', 'RolesController@create')
            ->name('roles.role.create');

        Route::get('/show/{role}', 'RolesController@show')
            ->name('roles.role.show')
            ->where('id', '[0-9]+');

        Route::get('/{role}/edit', 'RolesController@edit')
            ->name('roles.role.edit')
            ->where('id', '[0-9]+');

        Route::post('/', 'RolesController@store')
            ->name('roles.role.store');

        Route::put('role/{role}', 'RolesController@update')
            ->name('roles.role.update')
            ->where('id', '[0-9]+');

        Route::delete('/role/{role}', 'RolesController@destroy')
            ->name('roles.role.destroy')
            ->where('id', '[0-9]+');

    });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', function () {
    return view('auth.login');});

Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/vistadm', 'VistadmController@index')->name('index');

Route::group(
    [
        'prefix' => 'vistadms',
    ], function () {

        Route::get('/', 'VistadmController@index')
            ->name('vistadms.vistadm.index');

        Route::get('/index2', 'VistadmController@index2')
            ->name('vistadms.vistadm.index2');

        Route::post('/', 'VistadmController@store')
            ->name('vistadms.vistadm.store');

        Route::post('/storepaciente', 'VistadmController@storepaciente')
            ->name('vistadms.vistadm.storepaciente');

        Route::post('/mensaje', 'VistadmController@mensaje')
            ->name('vistadms.vistadm.mensaje');

    });
