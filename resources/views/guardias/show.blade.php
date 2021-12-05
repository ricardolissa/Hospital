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
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div align="center" class="panel-body">
                <h3>
                    Fecha     
                </h3><br>
                <h2>{{ $guardia->fecha }}</h2>
            </div>
        </div>
    </div>
    <br>
        <div class="row">
            <div class="col-md-12">
                <div align="center" class="panel-body">
                    <h3>
                        Medicos Asignados
                    </h3>
                </div>
            </div>
        </div>
        

<br>

        <div class="row">
            <div class="col-md-12">
                
                <div class="row">
                    @foreach($personas as $persona)
                    <div class="col-sm-2">
                        <div align="center" class="panel-body">
                           
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-text">
                                        {{ $persona->apellido }} {{ $persona->nombre }}
                                    </p>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>







<br>
        <div align="center" class="row">
            <div class="col-md-12">
                <div class="pull-right">
                    <form accept-charset="UTF-8" action="{!! route('guardias.guardia.destroy', $guardia->id) !!}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-xs" role="group">
                                <a class="btn btn-primary" href="{{ route('guardias.guardia.index') }}" title="Mostrar todas las Guardia">
                                    <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                        Volver
                                    </span>
                                </a>
                                <a class="btn btn-success" href="{{ route('guardias.guardia.edit', $guardia->id ) }}" title="Editar Guardia">
                                    <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                        Editar
                                    </span>
                                </a>
                                <button class="btn btn-danger" onclick='return confirm("Delete Guardia??")' title="Borrar Guardia" type="submit">
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
