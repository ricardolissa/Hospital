@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Crear Medico' }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-group-xs pull-right" role="group">
                <a class="btn btn-primary" href="{{ route('medicos.medicos.index') }}" title="Mostrar todos los Medicos">
                    <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                        Volver
                    </span>
                </a>
            </div>
        </div>
    </div>
    <br>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <div class="form-group">
                        <div align="center" class="col-md-12">
                            <form accept-charset="UTF-8" action="{{ route('medicos.medicos.create') }}" class="form-inline pull-right" method="GET">
                               <input class="form-control" id="dni" minlength="1" name="dni" placeholder="Ingrese DNI" type="text">
                                </input>
                                <button class="btn btn-default" type="submit">
                                    <span aria-hidden="true" class="btn btn-primary">
                                        Buscar
                                    </span>
                                </button>
                            </form>
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
                    <form accept-charset="UTF-8" action="{{ route('medicos.medicos.store') }}" class="form-horizontal" enctype="multipart/form-data" id="create_medicos_form" method="POST" name="create_medicos_form">
                        {{ csrf_field() }}
            @include ('medicos.form', [
                                        'medicos' => null,
                                      ])
                        <div class="form-group">
                            <div align="center" class="col-md-12">
                                <input class="btn btn-success" type="submit" value="Crear">
                                </input>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </br>
</div>
@endsection