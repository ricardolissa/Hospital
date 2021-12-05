@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ isset($title) ? $title : 'Rol' }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md">
             <h3> Descripcion:</h3> <h2>{{ $role->descripcion }}</h2>
                    
                     
                    
                </div>
                
                <div class="col-md">
                   
                          <h3>Nombre:</h3><h2> {{ $role->name }}</h2>
                </div>
            </div>
        </div>
    </div>
    <br>
        <div align="center" class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <form accept-charset="UTF-8" action="{!! route('roles.role.destroy', $role->id) !!}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-xs" role="group">
                                <a class="btn btn-primary" href="{{ route('roles.role.index') }}" title="Mostrar todos los Roles">
                                    <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                        Volver
                                    </span>
                                </a>
                                <a class="btn btn-success" href="{{ route('roles.role.edit', $role->id ) }}" title="Editar Rol">
                                    <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                        Editar
                                    </span>
                                </a>
                                <button class="btn btn-danger" onclick='return confirm("Delete Role??")' title="Borrar Rol" type="submit">
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
    </br>
</div>
@endsection
