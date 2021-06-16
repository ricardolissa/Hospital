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
                            Obras Social
                        </h1>
                    </div>
                    <div class="btn-group btn-group-xs pull-right" role="group">
                        <a class="btn btn-success" href="{{ route('obrasocials.obrasocial.create') }}" title="Crear Nueva Obra Social">
                            <span aria-hidden="true" class="glyphicon glyphicon-plus">
                                Crear
                            </span>
                        </a>
                    </div>
                </div>
                <br>
                    @if(count($obrasocials) == 0)
                    <div class="panel-body text-center">
                        <h4>
                            No Obras Social Disponible!
                        </h4>
                    </div>
                    @else
                    <div class="panel-body panel-body-with-table">
                        <div class="table-responsive">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th>
                                            Nombre
                                        </th>
                                        <th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($obrasocials as $obrasocial)
                                    <tr>
                                        <td>
                                            {{ $obrasocial->nombre }}
                                        </td>
                                        <td>
                                            <form accept-charset="UTF-8" action="{!! route('obrasocials.obrasocial.destroy', $obrasocial->id) !!}" method="POST">
                                                <input name="_method" type="hidden" value="DELETE">
                                                    {{ csrf_field() }}
                                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                                        <a class="btn btn-info" href="{{ route('obrasocials.obrasocial.show', $obrasocial->id ) }}" title="Mostrar Obra Social">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-open">
                                                                Mostrar
                                                            </span>
                                                        </a>
                                                        <a class="btn btn-primary" href="{{ route('obrasocials.obrasocial.edit', $obrasocial->id ) }}" title="Editar Obra Social">
                                                            <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                                                Editar
                                                            </span>
                                                        </a>
                                                        <button class="btn btn-danger" onclick='return confirm("Delete Obrasocial?")' title="Borrar Obra Social" type="submit">
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
                        {!! $obrasocials->render() !!}
                    </div>
                    @endif
                </br>
            </div></div></div></div>
            @endsection
        </div>
    </div>
</div>