@extends('layouts.app')

@section('content')

 @if(Session::has('success_message'))
<div class="alert alert-success">
    <span class="glyphicon glyphicon-ok">
    </span>
    {!! session('success_message') !!}
    <button aria-label="close" class="close" data-dismiss="alert" type="button">
        <span aria-hidden="true">
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
                            {{ !empty($title) ? $title : 'Historia Clinica : '  }}
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
                                        <form accept-charset="UTF-8" action="{{ route('consultas.consulta.historiaclinica') }}" method="GET">
                                            <div class="row">
                                                <div class="col-md">
                                                </div>
                                                <div align="center" class="col-md">
                                                    <input align="left" class="form-control" id="dni" minlength="1" name="dni" placeholder="Ingrese el DNI" type="text">
                                                    </input>
                                                    <br>
                                                        <button aling="pull-right" aria-hidden="true" class="btn btn-info" type="submit">
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
                                    <div class="col-md-12">
                                        @if($historiaclinicas== null)
                                        <div class="panel-body text-center">
                                            <h4>
                                                No posee historia clinica!
                                            </h4>
                                        </div>
                                        @else
                                        <table class="table table-hover table-striped">
                                            <tbody align="center">
                                                <tr>
                                                    <td>
                                                        Diagnostico
                                                    </td>
                                                    <td>
                                                        Receta
                                                    </td>
                                                    <td>
                                                        Fecha
                                                    </td>
                                                    <td>
                                                        Medico
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                @foreach($historiaclinicas as $historiaclinica)
                                                <tr>
                                                    <td>
                                                        {{ $historiaclinica->diagnostico }}
                                                    </td>
                                                    <td>
                                                        {{ $historiaclinica->receta }}
                                                    </td>
                                                    <td>
                                                        {{ $historiaclinica->fecha }}
                                                    </td>
                                                    <td>
                                                        {{ $persona->nombre }} {{ $persona->apellido }}
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary" href="{{ route('consultas.consulta.showHistoria', $historiaclinica->id ) }}" title="Seleccionar">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                                                Seleccionar
                                                            </span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @endif
                                    </div>
                                </div>
                            </br>
                        </br>
                    </div>
                </br>
            </div>
        </div>
    </div>
</div>
@endsection
