@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-5 mb-5">Ingrese datos del Paciente</h4>
            </span>

           
        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route ('pacientes.paciente.store2') }}" accept-charset="UTF-8" id="create_paciente_form" name="create_paciente_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('pacientes.form', [
                                        'paciente' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Registrar Paciente">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection