@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Editar Guardia' }}
                        </h1>
                    </div>
                    <div class="col-md-12">
                        <div class="btn-group btn-group-xs pull-right" role="group">
                            <a class="btn btn-primary" href="{{ route('guardias.guardia.index') }}" title="Mostrar todas las Guardias">
                                <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                    Mostrar
                                </span>
                            </a>
                            <a class="btn btn-success" href="{{ route('guardias.guardia.create') }}" title="Crear Nueva Guardia">
                                <span aria-hidden="true" class="glyphicon glyphicon-plus">
                                    Crear
                                </span>
                            </a>
                        </div>
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
                            <form accept-charset="UTF-8" action="{{ route('guardias.guardia.update', $guardia->id) }}" class="form-horizontal" id="edit_guardia_form" method="POST" name="edit_guardia_form">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PUT">
                                    @include ('guardias.form', [
                                        'guardia' => $guardia,
                                      ])
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-10">
                                            <input class="btn btn-primary" title="Actualizar Guardia" type="submit" value="Actualizar">
                                            </input>
                                        </div>
                                    </div>
                                </input>
                            </form>
                        </div>
                    </br>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection