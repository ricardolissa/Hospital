@extends('layouts.app')

@section('content')
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
                    <div class="pull-right">
                        <form accept-charset="UTF-8" action="{!! route('personas.persona.destroy', $persona->id) !!}" method="POST">
                            <input name="_method" type="hidden" value="DELETE">
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs" role="group">
                                    <a class="btn btn-primary" href="{{ route('personas.persona.index') }}" title="Mostrar todas las Personas">
                                        <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                            Mostrar
                                        </span>
                                    </a>
                                    <a class="btn btn-success" href="{{ route('personas.persona.create') }}" title="Crear nueva Persona">
                                        <span aria-hidden="true" class="glyphicon glyphicon-plus">
                                            Crear
                                        </span>
                                    </a>
                                    <a class="btn btn-primary" href="{{ route('personas.persona.edit', $persona->id ) }}" title="Editar Persona">
                                        <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                            Editar
                                        </span>
                                    </a>
                                    <button class="btn btn-danger" onclick='return confirm("Delete Persona??")' title="Borrar Persona" type="submit">
                                        <span aria-hidden="true" class="glyphicon glyphicon-trash">
                                            Borrar
                                        </span>
                                    </button>
                                </div>
                            </input>
                        </form>
                    </div>
                </div>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>
                            Nombre
                        </dt>
                        <dd>
                            {{ $persona->nombre }}
                        </dd>
                        <dt>
                            Apellido
                        </dt>
                        <dd>
                            {{ $persona->apellido }}
                        </dd>
                        <dt>
                            Dni
                        </dt>
                        <dd>
                            {{ $persona->dni }}
                        </dd>
                        <dt>
                            Email
                        </dt>
                        <dd>
                            {{ $persona->email }}
                        </dd>
                        <dt>
                            Fecha Nacimiento
                        </dt>
                        <dd>
                            {{ $persona->fecha_nacimiento }}
                        </dd>
                        <dt>
                            Edad
                        </dt>
                        <dd>
                            {{ $persona->edad }}
                        </dd>
                    </dl>
                </div>
            </div>
            @endsection
        </div>
    </div>
</div>