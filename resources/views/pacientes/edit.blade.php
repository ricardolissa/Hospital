@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ $paciente->persona->apellido }} {{ $paciente->persona->nombre }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group btn-group-xs pull-right" role="group">
                <a class="btn btn-primary" href="{{ route('pacientes.paciente.index') }}" title="Mostrar todos los Paciente">
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
                    <form accept-charset="UTF-8" action="{{ route('pacientes.paciente.update', $paciente->id) }}" class="form-horizontal" id="edit_paciente_form" method="POST" name="edit_paciente_form">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                            @include ('pacientes.formedit', [
                                                'paciente' => $paciente,
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
