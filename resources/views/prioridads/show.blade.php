@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left" align="center">
            <h1 class="mt-5 mb-5">{{ isset($title) ? $title : 'Prioridades' }}</h1>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('prioridads.prioridad.destroy', $prioridad->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-xs" role="group">
                    <a href="{{ route('prioridads.prioridad.index') }}" class="btn btn-primary" title="Mostrar todas las Prioridades">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Mostrar</span>
                    </a>

                    <a href="{{ route('prioridads.prioridad.create') }}" class="btn btn-success" title="Crear Nueva Prioridad">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Crear</span>
                    </a>
                    
                    <a href="{{ route('prioridads.prioridad.edit', $prioridad->id ) }}" class="btn btn-primary" title="Editar Prioridad">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Editar</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Borrar Prioridad" onclick="return confirm(&quot;Delete Prioridad??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Borrar</span>
                    </button>
                </div>
            </form>

        </div>

    </div>
<br><br>
    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Nombre</dt>
            <dd>{{ $prioridad->nombre }}</dd>

        </dl>

    </div>
</div>

@endsection