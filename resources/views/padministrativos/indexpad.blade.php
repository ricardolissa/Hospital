@extends('layouts.app')

@section('content')
<div>
    <h1>
        GUARDIA
    </h1>
</div>

<form accept-charset="UTF-8" action="{{ route('regpacientes.regpaciente.bpersona') }}" method="POST">
    {{ csrf_field() }}
    
    <div>
        <label>
            Dni
        </label>
        <input class="form-control" id="dni" minlength="1" name="dni" placeholder="Numero de Dni" type="text">
        </input>
        <input class="btn btn-primary" type="submit" value="Buscar">
        </input>
    </div>

</form>

<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <div class="pull-left">
            <h4 class="mt-5 mb-5">
                Resultado
            </h4>
        </div>
 
    </div>
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
    @endif
    @if(count($personas) == 0)
    <div class="panel-body text-center">
        <h4>
            No Personas Available!
        </h4>
    </div>
    @else
    <div class="panel-body panel-body-with-table">
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Apellido
                        </th>
                        <th>
                            Dni
                        </th>
                        <th>
                            Email
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personas as $persona)
                    <tr>
                        <td>
                            {{ $persona->nombre }}
                        </td>
                        <td>
                            {{ $persona->apellido }}
                        </td>
                        <td>
                            {{ $persona->dni }}
                        </td>
                        <td>
                            {{ $persona->email }}
                        </td>
                  
                    	<td>
       	<div class="btn-group btn-group-sm pull-right" role="group">
            <a class="btn btn-success" href="{{ route('personas.persona.create') }}" title="Seleccionar Persona">
                <span aria-hidden="true" class="glyphicon glyphicon-plus">
                </span>
            </a>
        </div>

                    	</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>

<form accept-charset="UTF-8" action="{{ route('regpacientes.regpaciente.bpersona') }}" method="POST">
    {{ csrf_field() }}
    
    <div>
        <label>
            Padecimiento actual
        </label>
        <input class="form-control" id="dni" minlength="1" name="dni" placeholder="Padecimiento Actual" type="text">
        </input>
        <input class="btn btn-primary" type="submit" value="Buscar">
        </input>
    </div>

</form>
<form accept-charset="UTF-8" action="{{ route('regpacientes.regpaciente.bpersona') }}" method="POST">
    {{ csrf_field() }}
    
    <div>
        <label>
            Prioridad
        </label>
        <input class="form-control" id="dni" minlength="1" name="prioridad" placeholder="Seleccione Prioridad" type="text">
        
    </div>

</form>

</input>
        <input class="btn btn-primary" type="submit" value="Registrar">
        </input>