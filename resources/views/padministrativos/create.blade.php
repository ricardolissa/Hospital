@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Crear Administrativo' }}
                        </h1>
                    </div>
                    <div class="col-md-12">
                        <div class="btn-group btn-group-xs pull-right" role="group">
                            <a class="btn btn-primary" href="{{ route('padministrativos.padministrativo.index') }}" title="Mostrar todos los Administrativos">
                                <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                    Mostrar
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                    <div class="col-md-12">
                        <form accept-charset="UTF-8" action="{{ route('padministrativos.padministrativo.create') }}" class="form-inline pull-right" method="GET">
                            <div class="form-group">
                                <input class="form-control" id="dni" minlength="1" name="dni" placeholder="Ingrese DNI" type="text">
                                </input>
                                <button class="btn btn-default" type="submit">
                                    <span aria-hidden="true" class="btn btn-primary">
                                        Buscar
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <br>
                        <div class="panel-body">
                            @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                                @endforeach
                            </ul>
                            @endif
                            <form accept-charset="UTF-8" action="{{ route('padministrativos.padministrativo.store') }}" class="form-horizontal" enctype="multipart/form-data" id="create_padministrativo_form" method="POST" name="create_padministrativo_form">
                                {{ csrf_field() }}
            @include ('padministrativos.form', [
                                        'padministrativo' => null,
                                      ])
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-10">
                                        <input class="btn btn-success" type="submit" value="Crear">
                                        </input>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </br>
                </br>
            </div>
        </div>
    </div>
</div>


@endsection
