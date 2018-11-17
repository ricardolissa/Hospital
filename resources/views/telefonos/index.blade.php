@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Telefonos</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('telefonos.telefono.create') }}" class="btn btn-success" title="Create New Telefono">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($telefonos) == 0)
            <div class="panel-body text-center">
                <h4>No Telefonos Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Numero</th>
                            <th>Persona</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($telefonos as $telefono)
                        <tr>
                            <td>{{ $telefono->numero }}</td>
                            <td>{{ optional($telefono->persona)->nombre }}</td>

                            <td>

                                <form method="POST" action="{!! route('telefonos.telefono.destroy', $telefono->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('telefonos.telefono.show', $telefono->id ) }}" class="btn btn-info" title="Show Telefono">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('telefonos.telefono.edit', $telefono->id ) }}" class="btn btn-primary" title="Edit Telefono">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Telefono" onclick="return confirm(&quot;Delete Telefono?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
            {!! $telefonos->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection