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
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div align="center" class="panel-body">
              
                       <h3> Nombre:    {{ $especialidad->nombre }} </h3>
               
            </div>
        </div>
    </div>
    <br>
    <div align="center" class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <form accept-charset="UTF-8" action="{!! route('especialidades.especialidad.destroy', $especialidad->id) !!}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <div class="btn-group btn-group-xs" role="group">
                            <a class="btn btn-primary" href="{{ route('especialidades.especialidad.index') }}" title="Mostrar todas las Especialidades">
                                <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                    Volver
                                </span>
                            </a>
                            <a class="btn btn-success" href="{{ route('especialidades.especialidad.edit', $especialidad->id ) }}" title="Editar Especialidad">
                                <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                    Editar
                                </span>
                            </a>
                            <button class="btn btn-danger" onclick='return confirm("Delete Especialidad??")' title="Delete Especialidad" type="submit">
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