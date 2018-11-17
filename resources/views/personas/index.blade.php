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
                <h4 class="mt-5 mb-5">Personas</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('personas.persona.create') }}" class="btn btn-success" title="Create New Persona">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($personas) == 0)
            <div class="panel-body text-center">
                <h4>No Personas Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dni</th>
                            <th>Email</th>
                            <th>Fecha Nacimiento</th>
                            <th>Edad</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($personas as $persona)
                        <tr>
                            <td>{{ $persona->nombre }}</td>
                            <td>{{ $persona->apellido }}</td>
                            <td>{{ $persona->dni }}</td>
                            <td>{{ $persona->email }}</td>
                            <td>{{ $persona->fecha_nacimiento }}</td>
                            <td>{{ $persona->edad }}</td>

                            <td>

                                <form method="POST" action="{!! route('personas.persona.destroy', $persona->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('personas.persona.show', $persona->id ) }}" class="btn btn-info" title="Show Persona">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('personas.persona.edit', $persona->id ) }}" class="btn btn-primary" title="Edit Persona">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Persona" onclick="return confirm(&quot;Delete Persona?&quot;)">
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
            {!! $personas->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection