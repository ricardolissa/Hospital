@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Guardia' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('guardias.guardia.destroy', $guardia->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('guardias.guardia.index') }}" class="btn btn-primary" title="Show All Guardia">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('guardias.guardia.create') }}" class="btn btn-success" title="Create New Guardia">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('guardias.guardia.edit', $guardia->id ) }}" class="btn btn-primary" title="Edit Guardia">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Guardia" onclick="return confirm(&quot;Delete Guardia??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Fecha</dt>
            <dd>{{ $guardia->fecha }}</dd>

        </dl>

    </div>
</div>

@endsection