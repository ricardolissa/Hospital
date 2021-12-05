@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Consulta' }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-2">
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
                <div class="col-sm-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                Medico
                            </h5>
                            <p class="card-text">
                                {{ ($consultas->medico)->persona->apellido }} {{ ($consultas->medico)->persona->nombre }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2">
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
                <div class="col-sm-2">
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
                <div class="col-sm-2">
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
                <div class="col-sm-2">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                Tiempo Consulta
                            </h5>
                            <p class="card-text">
                                {{ $consultas->tiempo_consulta }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Paciente
                                </h5>
                                <p class="card-text">
                                    {{ ($consultas->paciente)->persona->apellido }} {{ ($consultas->paciente)->persona->nombre }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
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
                    <div class="col-sm-4">
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
                </div><br>
                <div class="row">
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
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Medico
                                </h5>
                                <p class="card-text">
                                    {{ $consultas->prioridad->nombre }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Guardia
                                </h5>
                                <p class="card-text">
                                    {{  ($consultas->guardia)->id }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Atendido
                                </h5>
                                <p class="card-text">
                                    {{ $consultas->atendido }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </br>
        </div>
    </div>
</div>
<div class="row" align="center">
    <div class="col-md-12">
        <div class="pull-right">
            <form accept-charset="UTF-8" action="{!! route('consultas.consulta.destroy', $consultas->id) !!}" method="POST">
                <input name="_method" type="hidden" value="DELETE">
                    {{ csrf_field() }}
                    <div class="btn-group btn-group-xs" role="group">
                        <a class="btn btn-primary" href="{{ route('consultas.consulta.index') }}" title="Mostrar todas las Consultas">
                            <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                Volver
                            </span>
                        </a>
                      
                        <a class="btn btn-success" href="{{ route('consultas.consulta.edit', $consultas->id ) }}" title="Editar Consulta">
                            <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                Editar
                            </span>
                        </a>
                        <button class="btn btn-danger" onclick='return confirm("Click Ok to delete Consultas.?")' title="Borrar Consulta" type="submit">
                            <span aria-hidden="true" class="glyphicon glyphicon-trash">
                                Borrar
                            </span>
                        </button>
                    </div>
                </input>
            </form>
        </div>
    </div>
</div>
@endsection
