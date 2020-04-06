@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Consultas' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('consultas.consultas.destroy', $consultas->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('consultas.consultas.index') }}" class="btn btn-primary" title="Show All Consultas">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('consultas.consultas.create') }}" class="btn btn-success" title="Create New Consultas">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('consultas.consultas.edit', $consultas->id ) }}" class="btn btn-primary" title="Edit Consultas">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Consultas" onclick="return confirm(&quot;Click Ok to delete Consultas.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Diagnostico</dt>
            <dd>{{ $consultas->diagnostico }}</dd>
            <dt>Receta</dt>
            <dd>{{ $consultas->receta }}</dd>
            <dt>Fecha</dt>
            <dd>{{ $consultas->fecha }}</dd>
            <dt>Arribo</dt>
            <dd>{{ $consultas->arribo }}</dd>
            <dt>Egreso</dt>
            <dd>{{ $consultas->egreso }}</dd>
            <dt>Tiempo Consulta</dt>
            <dd>{{ $consultas->tiempo_consulta }}</dd>
            <dt>Paciente</dt>
            <dd>{{ optional($consultas->paciente)->antecedentes_familiares }}</dd>
            <dt>Medico</dt>
            <dd>{{ optional($consultas->medico)->foto }}</dd>
            <dt>Guardia</dt>
            <dd>{{ optional($consultas->guardia)->id }}</dd>
            <dt>Prioridad</dt>
            <dd>{{ optional($consultas->prioridad)->nombre }}</dd>
            <dt>Padecimiento Actual</dt>
            <dd>{{ $consultas->padecimiento_actual }}</dd>
            <dt>Atendido</dt>
            <dd>{{ $consultas->atendido }}</dd>

        </dl>

    </div>
</div>

@endsection