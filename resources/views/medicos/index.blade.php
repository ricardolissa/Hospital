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
                              {{ !empty($title) ? $title : 'Medicos' }}
                        </h1>
                    </div>
                    <div class="btn-group btn-group-xs pull-right" role="group">
                        <a class="btn btn-success" href="{{ route('medicos.medicos.create') }}" title="Crear Nuevo Medico">
                            <span aria-hidden="true" class="glyphicon glyphicon-plus">
                                Crear
                            </span>
                        </a>
                    </div>
                </div>
                <br>
                    @if(count($medicosObjects) == 0)
                    <div class="panel-body text-center">
                        <h4>
                            No Medicos Disponible!
                        </h4>
                    </div>
                    @else
                    <div class="panel-body panel-body-with-table">
                        <div class="table-responsive">
                            <table class="table table-striped " >
                                <thead align="center">
                                    <tr>
                                        <th>
                                            Nombre
                                        </th>
                                        <th>
                                            Foto
                                        </th>
                                        <th>
                                            Legajo
                                        </th>
                                        <th>
                                            Matricula
                                        </th>
                                        <th>
                                            Especialidades
                                        </th>
                                    </tr>
                                </thead>
                                <tbody align="center">
                                    @foreach($medicosObjects as $medicos)
                                    <tr>
                                        <td>
                                            {{ optional($medicos->persona)->apellido }}, {{ optional($medicos->persona)->nombre }}
                                        </td>
                                        <td>
                                            <img src="images/{{ $medicos->foto }}" width="100">
                                            </img>
                                        </td>
                                        <td>
                                            {{ $medicos->legajo }}
                                        </td>
                                        <td>
                                            {{ $medicos->matricula }}
                                        </td>
                                        <td>
                                            @foreach ($medicos->especialidades as $especialidad)
      
                                    / {{$especialidad->nombre}} 
      
                                @endforeach
                                        </td>
                                        <td>
                                            <form accept-charset="UTF-8" action="{!! route('medicos.medicos.destroy', $medicos->id) !!}" method="POST">
                                                <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}
                                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                                        <a class="btn btn-info" href="{{ route('medicos.medicos.show', $medicos->id ) }}" title="Mostrar Medico" >
                                                            <span aria-hidden="true" class="glyphicon glyphicon-open">
                                                                Mostrar
                                                            </span>
                                                        </a>
                                                        <a class="btn btn-primary" href="{{ route('medicos.medicos.edit', $medicos->id ) }}" title="Editar Medico">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                                                Editar
                                                            </span>
                                                        </a>
                                                        <button class="btn btn-danger" onclick='return confirm("Delete Medicos?")' title="Borrar Medico" type="submit">
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
                    <div class="panel-footer" >
                        {!! $medicosObjects->render() !!}
                    </div>
                    @endif
                </br>
            </div>
        </div>
    </div>
</div>
@endsection
