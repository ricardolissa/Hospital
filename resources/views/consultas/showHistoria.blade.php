@extends('layouts.app')

@section('content')
<head>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Historia Clinica : ' }}  {{ $consultas->paciente->persona->apellido }}, {{ $consultas->paciente->persona->nombre }}
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Fecha
                                </h5>
                                <p class="card-text">
                                    {{ $consultas->fecha }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Medico
                                </h5>
                                <p class="card-text">
                                    {{ $consultas->medico->persona->apellido }}, {{ $consultas->medico->persona->nombre }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Arribo
                                </h5>
                                <p class="card-text">
                                    {{ $consultas->arribo }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Egreso
                                </h5>
                                <p class="card-text">
                                    {{ $consultas->egreso }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Prioridad
                                </h5>
                                <p class="card-text">
                                    {{ $consultas->prioridad->nombre }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Padecimiento Actual
                                </h5>
                                <p class="card-text">
                                    {{ $consultas->padecimiento_actual }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Diagnostico
                                </h5>
                                <p class="card-text">
                                    {{ $consultas->diagnostico }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Receta
                                </h5>
                                <p class="card-text">
                                    {{ $consultas->receta }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                    <div class="row" align="center">
                        
                            <div class="col-md">                                               
                                <a class="btn btn-primary" href="{{ url()->previous($consultas->medico->persona->dni) }}" title="Mostrar todas las Consultas">
                                <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                    Volver 
                                </span>
                            </a>
                            </div>
                        
                            <div class="col-md">
                                <form accept-charset="UTF-8" action="{{ route('consultas.consulta.consultaPdf') }}" method="GET">
                                    <input class="form-control" id="consultaPdf" name="consultaPdf" value="{{ $consultas->id}}" hidden=""></input>
                                    <button aria-hidden="true" class="btn btn-info" type="submit">
                                                        Descargar PDF
                                                    </button>
                                </form>
                            </div>
                        
                    </div>
                </br>
            </div>
        </div>
    </div>
</div>
@endsection
