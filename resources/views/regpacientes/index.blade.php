@extends('layouts.app')

@section('content')


 @if(Session::has('success_message'))
<div class="alert alert-success">
    <span class="glyphicon glyphicon-ok">
    </span>
    {!! session('success_message') !!}
    <button aria-label="close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">
            ×
        </span>
    </button>
</div>
@endif
<br>
    <div align="center">
        <h1>
            Guardia
        </h1>
    </div>
    <br>
        <br>
            <br>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-header">
                                <h1>
                                    Busqueda de Paciente
                                </h1>
                                <div class="pull-right">
                                    <form accept-charset="UTF-8" action="{{ route('regpacientes.regpaciente.index') }}" class="form-inline pull-right" method="GET">
                                        <div class="form-group">
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <input class="form-control" id="dni" minlength="1" name="dni" type="text" value="Ingrese el DNI">
                                                    </input>
                                                    <button class="btn btn-default" type="submit">
                                                        <span aria-hidden="true" class="btn btn-primary">
                                                            Buscar
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </br>
            <br>
            </br>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-hover table-striped">
                        <tbody>
                            <tr>
                                <td>
                                    Nombre
                                </td>
                                <td>
                                    Apellido
                                </td>
                                <td>
                                    Dni
                                </td>
                                <td>
                                    Obra Social
                                </td>
                            </tr>
                            @foreach($pacientes as $paciente)
                            <tr>
                                <td>
                                    {{ $paciente->nombre }}
                                </td>
                                <td>
                                    {{ $paciente->apellido }}
                                </td>
                                <td>
                                    {{ $paciente->dni }}
                                </td>
                                <td>
                                    {{ $paciente->obraNombre }}
                                </td>
                                <td>
                                    <form accept-charset="UTF-8" action="{!! route('pacientes.paciente.destroy', $paciente->id) !!}" method="POST">
                                        <input name="_method" type="hidden" value="DELETE">
                                            {{ csrf_field() }}
                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                <a class="btn btn-primary" href="{{ route('regpacientes.regpaciente.triage', $paciente->id ) }}" title="Seleccionar">
                                                    <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                                        Select
                                                    </span>
                                                </a>
                                            </div>
                                        </input>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-10">
                        <a class="btn btn-danger" href="{{route('pacientes.paciente.create') }}" value="Seleccionar">
                            Registrar Paciente
                        </a>
                    </div>
                </div>
            </div>
        </br>
    </br>
</br>
@endsection
