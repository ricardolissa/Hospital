@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Editar Persona' }}
                        </h1>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="btn-group btn-group-xs pull-right" role="group">
                        <a class="btn btn-primary" href="{{ route('personas.persona.index') }}" title="Mostrar todas las Personas">
                            <span aria-hidden="true" class="glyphicon glyphicon-th-list" value="">
                                Mostrar
                            </span>
                        </a>
                        <a class="btn btn-success" href="{{ route('personas.persona.create') }}" title="Crear nueva Persona">
                            <span aria-hidden="true" class="glyphicon glyphicon-plus">
                                Crear
                            </span>
                        </a>
                    </div>
                </div>
                <br>
                    <div class="panel-body">
                        @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        <form accept-charset="UTF-8" action="{{ route('personas.persona.update', $persona->id) }}" class="form-horizontal" id="edit_persona_form" method="POST" name="edit_persona_form">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">
                                @include ('personas.form', [
                                        'persona' => $persona,
                                      ])
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <input class="btn btn-primary" type="submit" value="Actualizar">
                                        </input>
                                    </div>
                                </div>
                            </input>
                        </form>
                    </div>
                </br>
            </div>
            @endsection
        </div>
    </div>
</div>
