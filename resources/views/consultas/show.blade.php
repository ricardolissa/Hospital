@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Consulta' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('consultas.consulta.destroy', $consulta->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('consultas.consulta.index') }}" class="btn btn-primary" title="Show All Consulta">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('consultas.consulta.create') }}" class="btn btn-success" title="Create New Consulta">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('consultas.consulta.edit', $consulta->id ) }}" class="btn btn-primary" title="Edit Consulta">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Consulta" onclick="return confirm(&quot;Delete Consulta??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Diagnostico</dt>
            <dd>{{ $consulta->diagnostico }}</dd>
            <dt>Receta</dt>
            <dd>{{ $consulta->receta }}</dd>
            <dt>Fecha</dt>
            <dd>{{ $consulta->fecha }}</dd>
            <dt>Arribo</dt>
            <dd>{{ $consulta->arribo }}</dd>
            <dt>Egreso</dt>
            <dd>{{ $consulta->egreso }}</dd>
            <dt>Tiempo Consulta</dt>
            <dd>{{ $consulta->tiempo_consulta }}</dd>
            <dt>Paciente</dt>
            <dd>{{ optional($consulta->paciente)->antecedentes_familiares }}</dd>
            <dt>Medico</dt>
            <dd>{{ optional($consulta->medico)->foto }}</dd>
            <dt>Guardia</dt>
            <dd>{{ optional($consulta->guardium)->id }}</dd>
            <dt>Prioridad</dt>
            <dd>{{ optional($consulta->prioridad)->nombre }}</dd>

        </dl>

    </div>
</div>

@endsection