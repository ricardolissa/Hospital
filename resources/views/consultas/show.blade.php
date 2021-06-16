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
                    <div class="pull-right">
                        <form accept-charset="UTF-8" action="{!! route('consultas.consulta.destroy', $consultas->id) !!}" method="POST">
                            <input name="_method" type="hidden" value="DELETE">
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs" role="group">
                                    <a class="btn btn-primary" href="{{ route('consultas.consulta.index') }}" title="Mostrar todas las Consultas">
                                        <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                            Mostrar
                                        </span>
                                    </a>
                                    <a class="btn btn-success" href="{{ route('consultas.consulta.create') }}" title="Crear Nueva Consulta">
                                        <span aria-hidden="true" class="glyphicon glyphicon-plus">
                                            Crear
                                        </span>
                                    </a>
                                    <a class="btn btn-primary" href="{{ route('consultas.consulta.edit', $consultas->id ) }}" title="Editar Consulta">
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
                <br>
                <div class="panel-body">
                    <dl class="dl-horizontal">
                        <dt>
                            Diagnostico
                        </dt>
                        <dd>
                            {{ $consultas->diagnostico }}
                        </dd>
                        <dt>
                            Receta
                        </dt>
                        <dd>
                            {{ $consultas->receta }}
                        </dd>
                        <dt>
                            Fecha
                        </dt>
                        <dd>
                            {{ $consultas->fecha }}
                        </dd>
                        <dt>
                            Arribo
                        </dt>
                        <dd>
                            {{ $consultas->arribo }}
                        </dd>
                        <dt>
                            Egreso
                        </dt>
                        <dd>
                            {{ $consultas->egreso }}
                        </dd>
                        <dt>
                            Tiempo Consulta
                        </dt>
                        <dd>
                            {{ $consultas->tiempo_consulta }}
                        </dd>
                        <dt>
                            Paciente
                        </dt>
                        <dd>
                            {{ optional($consultas->paciente)->antecedentes_familiares }}
                        </dd>
                        <dt>
                            Medico
                        </dt>
                        <dd>
                            {{ optional($consultas->medico)->foto }}
                        </dd>
                        <dt>
                            Guardia
                        </dt>
                        <dd>
                            {{ optional($consultas->guardia)->id }}
                        </dd>
                        <dt>
                            Prioridad
                        </dt>
                        <dd>
                            {{ optional($consultas->prioridad)->nombre }}
                        </dd>
                        <dt>
                            Padecimiento Actual
                        </dt>
                        <dd>
                            {{ $consultas->padecimiento_actual }}
                        </dd>
                        <dt>
                            Atendido
                        </dt>
                        <dd>
                            {{ $consultas->atendido }}
                        </dd>
                    </dl>
                </div>
            </div>
            @endsection
        </div>
    </div>
</div>