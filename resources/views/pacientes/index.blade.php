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
                            {{ !empty($title) ? $title : 'Pacientes' }}
                        </h1>
                    </div>
                    <div class="btn-group btn-group-xs pull-right" role="group">
                        <a class="btn btn-success" href="{{ route('pacientes.paciente.create') }}" title="Create New Paciente">
                            <span aria-hidden="true" class="glyphicon glyphicon-plus">
                                Crear
                            </span>
                        </a>
                    </div>
                </div>
                <br>
                    @if(count($pacientes) == 0)
                    <div class="panel-body text-center">
                        <h4>
                            No Pacientes Available!
                        </h4>
                    </div>
                    @else
                    <div class="panel-body panel-body-with-table">
                        <div class="table-responsive">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>
                                            Persona
                                        </th>
                                        <th>
                                            D.N.I.
                                        </th>
                                        <th>
                                            Obrasocial
                                        </th>
                                        <th>
                                            Antecedentes Familiares
                                        </th>
                                        <th>
                                            Antecedentes Patologico
                                        </th>
                                        <th>
                                            Antecedentes Nopatologico
                                        </th>
                                        <th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pacientes as $paciente)
                                    <tr>
                                        <td>
                                            {{ $paciente->persona->apellido }} {{ $paciente->persona->nombre }}
                                        </td>
                                        <td>
                                            {{ $paciente->persona->dni }}
                                        </td>
                                        <td>
                                            {{ $paciente->obrasocial->nombre }}
                                        </td>
                                        <td>
                                            {{ $paciente->antecedentes_familiares }}
                                        </td>
                                        <td>
                                            {{ $paciente->antecedentes_patologico }}
                                        </td>
                                        <td>
                                            {{ $paciente->antecedentes_nopatologico }}
                                        </td>
                                        <td>
                                            <form accept-charset="UTF-8" action="{!! route('pacientes.paciente.destroy', $paciente->id) !!}" method="POST">
                                                <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}
                                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                                        <a class="btn btn-info" href="{{ route('pacientes.paciente.show', $paciente->id ) }}" title="Mostrar Paciente">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-open">
                                                                Mostrar
                                                            </span>
                                                        </a>
                                                        <a class="btn btn-primary" href="{{ route('pacientes.paciente.edit', $paciente->id ) }}" title="Editar Paciente">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                                                Editar
                                                            </span>
                                                        </a>
                                                        <button class="btn btn-danger" onclick='return confirm("Delete Paciente?")' title="Borrar Paciente" type="submit">
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
                        {!! $pacientes->render() !!}
                    </div>
                    @endif
                </br>
            </div>
        </div>
    </div>
</div>
@endsection
