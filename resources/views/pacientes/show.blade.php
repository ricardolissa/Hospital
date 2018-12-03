@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Paciente' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('pacientes.paciente.destroy', $paciente->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('pacientes.paciente.index') }}" class="btn btn-primary" title="Show All Paciente">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('pacientes.paciente.create') }}" class="btn btn-success" title="Create New Paciente">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('pacientes.paciente.edit', $paciente->id ) }}" class="btn btn-primary" title="Edit Paciente">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Paciente" onclick="return confirm(&quot;Delete Paciente??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Persona</dt>
            <dd>{{ optional($paciente->persona)->nombre }}</dd>
            <dt>Obrasocial</dt>
            <dd>{{ optional($paciente->obrasocial)->numero_socio }}</dd>
            <dt>Antecedentes Familiares</dt>
            <dd>{{ $paciente->antecedentes_familiares }}</dd>
            <dt>Antecedentes Patologico</dt>
            <dd>{{ $paciente->antecedentes_patologico }}</dd>
            <dt>Antecedentes Nopatologico</dt>
            <dd>{{ $paciente->antecedentes_nopatologico }}</dd>
            <dt>Padecimiento Actual</dt>
            <dd>{{ $paciente->padecimiento_actual }}</dd>

        </dl>

    </div>
</div>

@endsection