@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <span class="pull-left">
            <h4 class="mt-5 mb-5">
                Reg Nuevo Paciente
            </h4>
        </span>
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
            <form accept-charset="UTF-8" action="{{ 'regpacientes.regpaciente.storePaciente' }}" class="form-horizontal" id="regpaciente_createPaciente_form" method="POST" name="regpaciente_createPaciente_form">
                {{ csrf_field() }}
            @include ('regpacientes.formPaciente', [
                                        'paciente' => null,
                                      ])
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                        </input>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
</div>