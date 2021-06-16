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
                            Guardias
                        </h1>
                    </div>
                            
                                <div class="btn-group btn-group-xs pull-right" role="group">
                                    <a class="btn btn-success" href="{{ route('guardias.guardia.create') }}" title="Crear Nueva Guardia">
                                        <span aria-hidden="true" class="glyphicon glyphicon-plus">
                                            Crear
                                        </span>
                                    </a>
                                </div>
                           
                </div>
                <br>

                
                    @if(count($guardias) == 0)
                    <div class="panel-body text-center">
                        <h4>
                            No Guardias Disponible!
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
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($guardias as $guardia)
                                    <tr>
                                        <td>
                                            {{ $guardia->fecha }}
                                        </td>
                                        <td>
                                            <form accept-charset="UTF-8" action="{!! route('guardias.guardia.destroy', $guardia->id) !!}" method="POST">
                                                <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}
                                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                                        <a class="btn btn-info" href="{{ route('guardias.guardia.show', $guardia->id ) }}" title="Mostrar Guardia">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-open">
                                                                Mostrar
                                                            </span>
                                                        </a>
                                                        <a class="btn btn-primary" href="{{ route('guardias.guardia.edit', $guardia->id ) }}" title="Editar Guardia">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                                                Editar
                                                            </span>
                                                        </a>
                                                        <button class="btn btn-danger" onclick='return confirm("Delete Guardia?")' title="Borrar Guardia" type="submit">
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
                        {!! $guardias->render() !!}
                    </div>
                    @endif
                </br>
            </div>
        </div>
    </div>
</div>

@endsection
