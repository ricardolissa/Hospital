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
                <h4 class="mt-5 mb-5">Medicos</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('medicos.medicos.create') }}" class="btn btn-success" title="Create New Medicos">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                </a>
            </div>

        </div>
        
        @if(count($medicosObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Medicos Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Foto</th>
                            <th>Legajo</th>
                            <th>Matricula</th>
                            <th>Especialidades</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($medicosObjects as $medicos)
                        <tr>
                            <td>{{ optional($medicos->persona)->nombre }}</td>
                            <td>{{ $medicos->foto }}</td>
                            <td>{{ $medicos->legajo }}</td>
                            <td>{{ $medicos->matricula }}</td>
                            <td>  @foreach ($medicos->especialidades as $especialidad)
      
                                    {{$especialidad->nombre  }}
      
                                @endforeach</td>


                            <td>

                                <form method="POST" action="{!! route('medicos.medicos.destroy', $medicos->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('medicos.medicos.show', $medicos->id ) }}" class="btn btn-info" title="Show Medicos">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">Show</span>
                                        </a>
                                        <a href="{{ route('medicos.medicos.edit', $medicos->id ) }}" class="btn btn-primary" title="Edit Medicos">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Medicos" onclick="return confirm(&quot;Delete Medicos?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
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
            {!! $medicosObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection