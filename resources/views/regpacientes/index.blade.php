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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Busqueda de Paciente' }}
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
                        <br>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form accept-charset="UTF-8" action="{{ route('regpacientes.regpaciente.index') }}" method="GET">
                                            <div class="row">
                                                <div class="col-md">
                                                </div>
                                                <div align="center" class="col-md">
                                                    <input align="left" class="form-control" id="dni" minlength="1" name="dni" placeholder="Ingrese el DNI" type="text"> 
                                                    </input>
                                                    <br>
                                                        <button aling="pull-right" aria-hidden="true" class="btn btn-primary" type="submit">
                                                            Buscar
                                                        </button>
                                                    </br>
                                                </div>
                                                <div class="col-md">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                                <div class="row">
                                    <div class="col-md">
                                        <table class="table table-hover table-striped">
                                            <tbody align="center">
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
                                                    <td>
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
                                                                            Seleccionar
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
                                <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md">
                                                </div>
                                                <div align="center" class="col-md">
                                                    <a class="btn btn-danger" href="{{route('regpacientes.regpaciente.createPersona') }}" value="Seleccionar">
                                                        Registrar Paciente
                                                    </a>
                                                </div>
                                                <div class="col-md">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </br>
                            </br>
                        </br>
                    </div>
                </br>
            </div>
        </div>
        @endsection
    </div>
</div>