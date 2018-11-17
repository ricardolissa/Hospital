@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Prioridad' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('prioridads.prioridad.destroy', $prioridad->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('prioridads.prioridad.index') }}" class="btn btn-primary" title="Show All Prioridad">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('prioridads.prioridad.create') }}" class="btn btn-success" title="Create New Prioridad">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('prioridads.prioridad.edit', $prioridad->id ) }}" class="btn btn-primary" title="Edit Prioridad">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Prioridad" onclick="return confirm(&quot;Delete Prioridad??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nombre</dt>
            <dd>{{ $prioridad->nombre }}</dd>

        </dl>

    </div>
</div>

@endsection