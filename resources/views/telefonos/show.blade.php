@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Telefono' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('telefonos.telefono.destroy', $telefono->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('telefonos.telefono.index') }}" class="btn btn-primary" title="Show All Telefono">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('telefonos.telefono.create') }}" class="btn btn-success" title="Create New Telefono">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('telefonos.telefono.edit', $telefono->id ) }}" class="btn btn-primary" title="Edit Telefono">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Telefono" onclick="return confirm(&quot;Delete Telefono??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Numero</dt>
            <dd>{{ $telefono->numero }}</dd>
            <dt>Persona</dt>
            <dd>{{ optional($telefono->persona)->nombre }}</dd>

        </dl>

    </div>
</div>

@endsection