@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Especialidad' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('especialidads.especialidad.destroy', $especialidad->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('especialidads.especialidad.index') }}" class="btn btn-primary" title="Show All Especialidad">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('especialidads.especialidad.create') }}" class="btn btn-success" title="Create New Especialidad">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('especialidads.especialidad.edit', $especialidad->id ) }}" class="btn btn-primary" title="Edit Especialidad">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Especialidad" onclick="return confirm(&quot;Delete Especialidad??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nombre</dt>
            <dd>{{ $especialidad->nombre }}</dd>

        </dl>

    </div>
</div>

@endsection