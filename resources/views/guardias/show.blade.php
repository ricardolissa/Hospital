@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">


<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Guardia' }}
                        </h1>
                    </div>


        <div class="pull-right">

            <form method="POST" action="{!! route('guardias.guardia.destroy', $guardia->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-xs" role="group">
                    <a href="{{ route('guardias.guardia.index') }}" class="btn btn-primary" title="Mostrar todas las Guardia">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Mostrar</span>
                    </a>

                    <a href="{{ route('guardias.guardia.create') }}" class="btn btn-success" title="Crear Nueva Guardia">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Crear</span>
                    </a>
                    
                    <a href="{{ route('guardias.guardia.edit', $guardia->id ) }}" class="btn btn-primary" title="Editar Guardia">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Editar</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Borrar Guardia" onclick="return confirm(&quot;Delete Guardia??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Borrar</span>
                    </button>
                </div>
            </form>

        </div>

    </div>
<br><br>
    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Fecha    : {{ $guardia->fecha }}</dt>

        </dl>

    </div>
</div>
</div>
</div>
</div>

@endsection