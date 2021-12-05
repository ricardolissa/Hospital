@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ $padministrativo->persona->apellido }} {{ $padministrativo->persona->nombre }}
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
                        <img src="/images/{{ $padministrativo->foto }}" width="100"/>
                    </dt>
                    <br>
                    <dt>
                        <h3> Legajo : {{ $padministrativo->legajo }} </h3>
                    </dt>
                   
                </dl>
            </div>
        </div>
    </div>
    <br>
        <div class="row" align="center">
            <div class="col-md-12">
                <div class="pull-right">
                    <form accept-charset="UTF-8" action="{!! route('padministrativos.padministrativo.destroy', $padministrativo->id) !!}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                            {{ csrf_field() }}
                            <div class="btn-group btn-group-xs" role="group">
                                <a class="btn btn-primary" href="{{ route('padministrativos.padministrativo.index') }}" title="Mostrar todos los Administrativos">
                                    <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                        Volver
                                    </span>
                                </a>
                                <a class="btn btn-success" href="{{ route('padministrativos.padministrativo.edit', $padministrativo->id ) }}" title="Editar Administrativo">
                                    <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                        Editar
                                    </span>
                                </a>
                                <button class="btn btn-danger" onclick='return confirm("Delete Padministrativo??")' title="Borrar Administrativo" type="submit">
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
