@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
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
                            {{ !empty($title) ? $title : 'Roles' }}
                        </h1>
                    </div>
            <div class="btn-group btn-group-xs pull-right" role="group">
                <a href="{{ route('roles.role.create') }}" class="btn btn-success" title="Crear Nuevo Rol">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Crear</span>
                </a>
            </div>

        </div>
        <br>
        @if(count($roles) == 0)
            <div class="panel-body text-center">
                <h4>No Roles Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->descripcion }}</td>
                            <td>
                                <form method="POST" action="{!! route('roles.role.destroy', $role->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('roles.role.show', $role->id ) }}" class="btn btn-info" title="Mostrar Rol">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">Mostrar</span>
                                        </a>
                                        <a href="{{ route('roles.role.edit', $role->id ) }}" class="btn btn-primary" title="Editar Rol">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Editar</span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Borrar Role" onclick="return confirm(&quot;Delete Role?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true">Borrar</span>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="panel-footer">
            {!! $roles->render() !!}
        </div>
                    @endif
                </br>
            </div>
        </div>
    </div>
</div>
@endsection