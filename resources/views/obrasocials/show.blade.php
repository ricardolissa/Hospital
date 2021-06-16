@extends('layouts.app')

@section('content')
<head>
    <link href="assets/css/bootstrap.min.css" media="screen" rel="stylesheet">
        <link href="assets/css/template.css" media="screen" rel="stylesheet">
            
</head>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Obras Social' }}
                        </h1>
                    </div>
                    <div class="pull-right">
                        <form accept-charset="UTF-8" action="{!! route('obrasocials.obrasocial.destroy', $obrasocial->id) !!}" method="POST">
                            <input name="_method" type="hidden" value="DELETE">
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs" role="group">
                                    <a class="btn btn-primary" href="{{ route('obrasocials.obrasocial.index') }}" title="Mostrar todas las Obras Sociales">
                                        <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                            Mostrar
                                        </span>
                                    </a>
                                    <a class="btn btn-success" href="{{ route('obrasocials.obrasocial.create') }}" title="Crear Nueva Obra Social">
                                        <span aria-hidden="true" class="glyphicon glyphicon-plus">
                                            Crear
                                        </span>
                                    </a>
                                    <a class="btn btn-primary" href="{{ route('obrasocials.obrasocial.edit', $obrasocial->id ) }}" title="Editar Obra Social">
                                        <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                            Editar
                                        </span>
                                    </a>
                                    <button class="btn btn-danger" onclick='return confirm("Delete Obrasocial??")' title="Borrar Obrasocial" type="submit">
                                        <span aria-hidden="true" class="glyphicon glyphicon-trash">
                                            Borrar
                                        </span>
                                    </button>
                                </div>
                            </input>
                        </form>
                    </div>
                </div>
                <br>
                    <br>
                        <div class="panel-body">
                            <dl class="dl-horizontal">
                                <dt>
                                    Nombre
                                </dt>
                                <dd>
                                    {{ $obrasocial->nombre }}
                                </dd>
                            </dl>
                        </div>
                    </br>
                </br>
            </div>
        </div>
    </div>
</div>

@endsection
