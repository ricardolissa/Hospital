@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Medicos' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('medicos.medicos.destroy', $medicos->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('medicos.medicos.index') }}" class="btn btn-primary" title="Show All Medicos">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('medicos.medicos.create') }}" class="btn btn-success" title="Create New Medicos">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('medicos.medicos.edit', $medicos->id ) }}" class="btn btn-primary" title="Edit Medicos">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Medicos" onclick="return confirm(&quot;Delete Medicos??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nombre</dt>
            <dd>{{ optional($medicos->persona)->nombre }}</dd>
            <dt>Foto</dt>
            <dd>{{ $medicos->foto }}</dd>
            <dt>Legajo</dt>
            <dd>{{ $medicos->legajo }}</dd>
            <dt>Matricula</dt>
            <dd>{{ $medicos->matricula }}</dd>
            <dt>Especialidad</dt>
            <dd>{{ $medicos->especialidad_id }}</dd>

        </dl>

    </div>
</div>

@endsection