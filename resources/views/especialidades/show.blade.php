@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Especialidad' }}
                        </h1>
                    </div>

        <div class="pull-right">

            <form method="POST" action="{!! route('especialidades.especialidad.destroy', $especialidad->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-xs" role="group">
                    <a href="{{ route('especialidades.especialidad.index') }}" class="btn btn-primary" title="Mostrar todas las Especialidades">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Mostrar</span>
                    </a>

                    <a href="{{ route('especialidades.especialidad.create') }}" class="btn btn-success" title="Crear Especialidad">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Crear</span>
                    </a>
                    
                    <a href="{{ route('especialidades.especialidad.edit', $especialidad->id ) }}" class="btn btn-primary" title="Editar Especialidad">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Editar</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Especialidad" onclick="return confirm(&quot;Delete Especialidad??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Borrar</span>
                    </button>
                </div>
            </form>

        </div>

    </div>
<br> <br>
    <div class="panel-body" align="center">
        <dl class="dl-horizontal">
            <dt>Nombre: </dt>
            <dd>{{ $especialidad->nombre }}</dd>

        </dl>

    </div>
</div>
</div>
</div>
</div>
@endsection