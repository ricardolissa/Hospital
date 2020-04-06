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
                <h4 class="mt-5 mb-5">Pacientes</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('pacientes.paciente.create') }}" class="btn btn-success" title="Create New Paciente">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                </a>
            </div>

        </div>
        
        @if(count($pacientes) == 0)
            <div class="panel-body text-center">
                <h4>No Pacientes Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Persona</th>
                            <th>Obrasocial</th>
                            <th>Antecedentes Familiares</th>
                            <th>Antecedentes Patologico</th>
                            <th>Antecedentes Nopatologico</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pacientes as $paciente)
                        <tr>
                            <td>{{ optional($paciente->persona)->dni }}</td>
                            <td>{{ optional($paciente->obrasocial)->nombre }}</td>
                            <td>{{ $paciente->antecedentes_familiares }}</td>
                            <td>{{ $paciente->antecedentes_patologico }}</td>
                            <td>{{ $paciente->antecedentes_nopatologico }}</td>

                            <td>

                                <form method="POST" action="{!! route('pacientes.paciente.destroy', $paciente->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('pacientes.paciente.show', $paciente->id ) }}" class="btn btn-info" title="Show Paciente">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">Show</span>
                                        </a>
                                        <a href="{{ route('pacientes.paciente.edit', $paciente->id ) }}" class="btn btn-primary" title="Edit Paciente">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Paciente" onclick="return confirm(&quot;Delete Paciente?&quot;)">
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
            {!! $pacientes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection