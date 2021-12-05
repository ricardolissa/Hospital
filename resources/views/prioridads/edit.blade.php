@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Editar Prioridad' }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-group-xs pull-right" role="group">
                <a class="btn btn-primary" href="{{ route('prioridads.prioridad.index') }}" title="Mostrar todas las Prioridades">
                    <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                        Volver
                    </span>
                </a>
            </div>
        </div>
    </div>
    <br>
        <div class="row">
            <div class="col-md-12">
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
                    <form accept-charset="UTF-8" action="{{ route('prioridads.prioridad.update', $prioridad->id) }}" class="form-horizontal" id="edit_prioridad_form" method="POST" name="edit_prioridad_form">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                            @include ('prioridads.form', [
                                        'prioridad' => $prioridad,
                                      ])
                            <div class="form-group">
                                <div align="center" class="col-md-12">
                                    <input class="btn btn-success" type="submit" value="Actualizar">
                                    </input>
                                </div>
                            </div>
                        </input>
                    </form>
                </div>
            </div>
        </div>
    </br>
</div>
@endsection
