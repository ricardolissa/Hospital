@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
<div class="alert alert-success">
    <span class="glyphicon glyphicon-ok">
    </span>
    {!! session('success_message') !!}
    <button aria-label="close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">
        </span>
    </button>
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Personas' }}
                        </h1>
                    </div>
                    <div class="btn-group btn-group-xs pull-right" role="group">
                            <a class="btn btn-success" href="{{ route('personas.persona.create') }}" title="Creae Nueva Persona">
                                <span aria-hidden="true" class="glyphicon glyphicon-plus">
                                    Crear
                                </span>
                            </a>
                    </div>
                </div>
                <br>
                    @if(count($personas) == 0)
                    <div class="panel-body text-center">
                        <h4>
                            No Personas Disponibles!
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
                                            Fecha Nacimiento
                                        </th>
                                        <th>
                                            Edad
                                        </th>
                                        <th></th>
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
                                            {{ $persona->fecha_nacimiento }}
                                        </td>
                                        <td>
                                            {{ $persona->edad }}
                                        </td>
                                       <td>
                                            <form accept-charset="UTF-8" action="{!! route('personas.persona.destroy', $persona->id) !!}" method="POST">
                                                <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}
                                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                                        <a class="btn btn-info" href="{{ route('personas.persona.show', $persona->id ) }}" title="Mostrar Persona">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-open">
                                                                Mostrar
                                                            </span>
                                                        </a>
                                                        <a class="btn btn-primary" href="{{ route('personas.persona.edit', $persona->id ) }}" title="Editar Persona">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                                                Editar
                                                            </span>
                                                        </a>
                                                        <button class="btn btn-danger" onclick='return confirm("Delete Persona?")' title="Borrar Persona" type="submit">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-trash">
                                                                Borrar
                                                            </span>
                                                        </button>
                                                    </div>
                                                </input>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        {!! $personas->render() !!}
                    </div>
                    @endif
                </br>
            </div>
        </div>
    </div>
</div>
@endsection
