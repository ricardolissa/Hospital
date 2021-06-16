@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Especialidad' }}
                        </h1>
                    </div>
                    <div class="col-md-12">
                        <div class="btn-group btn-group-xs pull-right" role="group">
                            <a class="btn btn-primary" href="{{ route('especialidades.especialidad.index') }}" title="Mostrar todas las Especialidades">
                                <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                    Mostrar
                                </span>
                            </a>
                            <a class="btn btn-success" href="{{ route('especialidades.especialidad.create') }}" title="Crear Nueva Especialidad">
                                <span aria-hidden="true" class="glyphicon glyphicon-plus">
                                    Crear
                                </span>
                            </a>
                        </div>
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
                        <form accept-charset="UTF-8" action="{{ route('especialidades.especialidad.update', $especialidad->id) }}" class="form-horizontal" id="edit_especialidad_form" method="POST" name="edit_especialidad_form">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">
                                @include ('especialidades.form', [
                                        'especialidad' => $especialidad,
                                      ])
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-12">
                                        <input class="btn btn-primary" type="submit" value="Actualizar">
                                        </input>
                                    </div>
                                </div>
                            </input>
                        </form>
                    </div>
                </br>
            </div>
        </div>
    </div>
</div>
@endsection
