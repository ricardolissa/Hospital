@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Reg Crear Persona' }}
                        </h1>
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
                        <form accept-charset="UTF-8" action="{{ route('regpacientes.regpaciente.storePersona') }}" class="form-horizontal" id="regpaciente_createPersona_form" method="POST" name="regpaciente_createPersona_form">
                            {{ csrf_field() }}
            @include ('regpacientes.formPersona', [
                                        'persona' => null,
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
            </div>
            @endsection
        </div>
    </div>
</div>