@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ $medicos->persona->apellido }} {{ $medicos->persona->nombre }}
                        </h1>
                    </div>
                    <div class="col-md-12">
                        <div class="btn-group btn-group-xs pull-right" role="group">
                            <a class="btn btn-primary" href="{{ route('medicos.medicos.index') }}" title="Mostrar todos los Medicos">
                                <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                    Volver
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
                            <form accept-charset="UTF-8" action="{{ route('medicos.medicos.update', $medicos->id) }}" class="form-horizontal" enctype="multipart/form-data" id="edit_medicos_form" method="POST" name="edit_medicos_form">
                                {{ csrf_field() }}
                                <input name="_method" type="hidden" value="PUT">
                                    @include ('medicos.formedit', [
                                        'medicos' => $medicos,

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
                    </br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
