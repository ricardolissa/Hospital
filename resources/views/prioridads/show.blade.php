@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ isset($title) ? $title : 'Prioridades' }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" align="center">
        <div class="col-md-12">
            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt>
                        Nombre : 
                    </dt>
                    <dd>
                        <h3>  {{ $prioridad->nombre }}</h3>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
    <br>
    <div class="row"align="center">
        <div class="col-md-12">
            <div class="pull-right">
                <form accept-charset="UTF-8" action="{!! route('prioridads.prioridad.destroy', $prioridad->id) !!}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <div class="btn-group btn-group-xs" role="group">
                            <a class="btn btn-primary" href="{{ route('prioridads.prioridad.index') }}" title="Mostrar todas las Prioridades">
                                <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                    Volver
                                </span>
                            </a>
                            <a class="btn btn-success" href="{{ route('prioridads.prioridad.edit', $prioridad->id ) }}" title="Editar Prioridad">
                                <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                    Editar
                                </span>
                            </a>
                            <button class="btn btn-danger" onclick='return confirm("Delete Prioridad??")' title="Borrar Prioridad" type="submit">
                                <span aria-hidden="true" class="glyphicon glyphicon-trash">
                                    Borrar
                                </span>
                            </button>
                        </div>
                    </input>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
