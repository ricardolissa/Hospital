@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <div class="pull-left">
            <h4 class="mt-5 mb-5">
                Paciente
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
                        <th>
                            
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
                             <a class="btn btn-info" href="{{ route('personas.persona.create') }}" title="Seleccionar">
                				<span aria-hidden="true" class="glyphicon glyphicon-open">
                				</span>
           					 </a>
                             <a class="btn btn-primary" href="{{ route('regpacientes.regpaciente.edit', $persona->id ) }}" title="Editar">
                                <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                </span>
                             </a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection