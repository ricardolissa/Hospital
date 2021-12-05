@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Crear Consulta' }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-group-xs pull-right" role="group">
                <a class="btn btn-primary" href="{{ route('consultas.consulta.index') }}" title="Mostrar todas las Consultas">
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
                    @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    <form accept-charset="UTF-8" action="{{ route('consultas.consulta.store') }}" class="form-horizontal" id="create_consultas_form" method="POST" name="create_consultas_form">
                        {{ csrf_field() }}
            @include ('consultas.form', [
                                        'consultas' => null,
                                      ])
                        <div class="form-group">
                            <div align="center" class="col-md-12">
                                <input class="btn btn-success" type="submit" value="Crear">
                                </input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </br>
</div>
@endsection
