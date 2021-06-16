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
                    <div class="pull-left" align="center">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Consultas' }}
                        </h1>
                    </div>
                </div>
                @if(count($consultas) == 0)
                <div class="panel-body text-center">
                    <h4>
                        No Consultas Disponibles!
                    </h4>
                </div>
                @else
                <div class="panel-body panel-body-with-table">
                    <div class="table-responsive">
                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th>
                                        Fecha/Arribo
                                    </th>
                                    <th>
                                        Apellido
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Prioridad
                                    </th>
                                    <th>
                                        Padecimiento Actual
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($consultas as $consulta)
                                <tr>
                                    <td>
                                        {{ $consulta->arribo }}
                                    </td>
                                    <td>
                                        {{ optional($consulta->paciente->persona)->apellido }}
                                    </td>
                                    <td>
                                        {{ optional($consulta->paciente->persona)->nombre}}
                                    </td>
                                    <td>
                                        {{ optional($consulta->prioridad)->nombre }}
                                    </td>
                                    <td>
                                        {{ $consulta->padecimiento_actual }}
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-xs pull-right" role="group">
                                            <a class="btn btn-primary" href="{{ route('consultas.consulta.consultamedicoedit', $consulta->id ) }}" title="Edit Consulta">
                                                <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                                    Seleccionar
                                                </span>
                                            </a>
                                            .
                                            <a class="btn btn-danger" href="" title="No atendido Consulta">
                                                <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                                    No atendido
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    {!! $consultas->render() !!}
                </div>
                @endif
            </div>
            @endsection
        </div>
    </div>
</div>