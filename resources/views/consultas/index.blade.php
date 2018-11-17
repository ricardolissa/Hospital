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
                <h4 class="mt-5 mb-5">Consultas</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('consultas.consulta.create') }}" class="btn btn-success" title="Create New Consulta">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($consultas) == 0)
            <div class="panel-body text-center">
                <h4>No Consultas Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Diagnostico</th>
                            <th>Receta</th>
                            <th>Fecha</th>
                            <th>Arribo</th>
                            <th>Egreso</th>
                            <th>Tiempo Consulta</th>
                            <th>Paciente</th>
                            <th>Medico</th>
                            <th>Guardia</th>
                            <th>Prioridad</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($consultas as $consulta)
                        <tr>
                            <td>{{ $consulta->diagnostico }}</td>
                            <td>{{ $consulta->receta }}</td>
                            <td>{{ $consulta->fecha }}</td>
                            <td>{{ $consulta->arribo }}</td>
                            <td>{{ $consulta->egreso }}</td>
                            <td>{{ $consulta->tiempo_consulta }}</td>
                            <td>{{ optional($consulta->paciente)->antecedentes_familiares }}</td>
                            <td>{{ optional($consulta->medico)->foto }}</td>
                            <td>{{ optional($consulta->guardium)->id }}</td>
                            <td>{{ optional($consulta->prioridad)->nombre }}</td>

                            <td>

                                <form method="POST" action="{!! route('consultas.consulta.destroy', $consulta->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('consultas.consulta.show', $consulta->id ) }}" class="btn btn-info" title="Show Consulta">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('consultas.consulta.edit', $consulta->id ) }}" class="btn btn-primary" title="Edit Consulta">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Consulta" onclick="return confirm(&quot;Delete Consulta?&quot;)">
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
            {!! $consultas->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection