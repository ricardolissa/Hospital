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
                            Administrativos
                        </h1>
                    </div>
                    <div class="btn-group btn-group-xs pull-right" role="group">
                        <a class="btn btn-success" href="{{ route('padministrativos.padministrativo.create') }}" title="Crar Nuevo Administrativo">
                            <span aria-hidden="true" class="glyphicon glyphicon-plus">
                                Crear
                            </span>
                        </a>
                    </div>
                </div>
                <br>
                    @if(count($padministrativos) == 0)
                    <div class="panel-body text-center">
                        <h4>
                            No Administrativos Disponibles!
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
                                            Foto
                                        </th>
                                        <th>
                                            Legajo
                                        </th>
                                        <th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($padministrativos as $padministrativo)
                                    <tr>
                                        <td>
                                            {{ optional($padministrativo->persona)->nombre }}
                                        </td>
                                        <td>
                                            <img src="images/{{ $padministrativo->foto }}" width="100">
                                            </img>
                                        </td>
                                        <td>
                                            {{ $padministrativo->legajo }}
                                        </td>
                                        <td>
                                            <form accept-charset="UTF-8" action="{!! route('padministrativos.padministrativo.destroy', $padministrativo->id) !!}" method="POST">
                                                <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}
                                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                                        <a class="btn btn-info" href="{{ route('padministrativos.padministrativo.show', $padministrativo->id ) }}" title="Mostrar Administrativo">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-open">
                                                                Mostrar
                                                            </span>
                                                        </a>
                                                        <a class="btn btn-primary" href="{{ route('padministrativos.padministrativo.edit', $padministrativo->id ) }}" title="Editar Administrativo">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                                                Editar
                                                            </span>
                                                        </a>
                                                        <button class="btn btn-danger" onclick='return confirm("Delete Padministrativo?")' title="Borrar Administrativo" type="submit">
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
                        {!! $padministrativos->render() !!}
                    </div>
                    @endif
                </br>
            </div>
            @endsection
        </div>
    </div>
</div>