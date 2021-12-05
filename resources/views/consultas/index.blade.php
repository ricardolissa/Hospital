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
                            {{ !empty($title) ? $title : 'Consultas' }}
                        </h1>
                    </div>
                    <div class="btn-group btn-group-xs pull-right" role="group">
                        <a class="btn btn-success" href="{{ route('consultas.consulta.create') }}" title="Crear Nueva Consulta">
                            <span aria-hidden="true" class="glyphicon glyphicon-plus">
                                Crear
                            </span>
                        </a>
                    </div>
                </div>
                <br>
                    @if(count($consultasObjects) == 0)
                    <div class="panel-body text-center">
                        <h4>
                            No Consultas Dispobibles!
                        </h4>
                    </div>
                    @else
                    <div class="panel-body panel-body-with-table">
                        <div class="table-responsive">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>
                                            Fecha
                                        </th>
                                        <th>
                                            Arribo
                                        </th>
                                        <th>
                                            Egreso
                                        </th>
                                        <th>
                                            Tiempo Consulta
                                        </th>
                                        <th>
                                            Paciente
                                        </th>
                                        <th>
                                            Medico
                                        </th>
                                        <th>
                                            Guardia
                                        </th>
                                        <th>
                                            Prioridad
                                        </th>
                                        <th>
                                            Padecimiento Actual
                                        </th>
                                        <th>
                                            Atendido
                                        </th>
                                        <th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($consultasObjects as $consultas)
                                    <tr>
                                        <td>
                                            {{ $consultas->fecha }}
                                        </td>
                                        <td>
                                            {{ $consultas->arribo }}
                                        </td>
                                        <td>
                                            {{ $consultas->egreso }}
                                        </td>
                                        <td>
                                            {{ $consultas->tiempo_consulta }}
                                        </td>
                                        <td>
                                            {{ optional($consultas->paciente->persona)->apellido}}
                                        </td>
                                        <td>
                                            {{ optional($consultas->medico)->id }}
                                        </td>
                                        <td>
                                            {{ optional($consultas->guardia)->id }}
                                        </td>
                                        <td>
                                            {{ optional($consultas->prioridad)->nombre }}
                                        </td>
                                        <td>
                                            {{ $consultas->padecimiento_actual }}
                                        </td>
                                        <td>
                                            {{ $consultas->atendido }}
                                        </td>
                                        <td>
                                            <form accept-charset="UTF-8" action="{!! route('consultas.consulta.destroy', $consultas->id) !!}" method="POST">
                                                <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}
                                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                                        <a class="btn btn-info" href="{{ route('consultas.consulta.show', $consultas->id ) }}" title="Mostrar Consultas">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-open">
                                                                Mostrar
                                                            </span>
                                                        </a>
                                                        <a class="btn btn-primary" href="{{ route('consultas.consulta.edit', $consultas->id ) }}" title="Editar Consultas">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                                                Editar
                                                            </span>
                                                        </a>
                                                        <button class="btn btn-danger" onclick='return confirm("Click Ok to delete Consultas.")' title="Borrar Consulta" type="submit">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-trash">
                                                                Borrar
                                                            </span>
                                                        </button>
                                                    </div>
                                                </input>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer">
                        {!! $consultasObjects->render() !!}
                    </div>
                    @endif
                </br>
            </div>
        </div>
    </div>
</div>
@endsection