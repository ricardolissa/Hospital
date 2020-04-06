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
                <a href="{{ route('consultas.consulta.create') }}" class="btn btn-success" title="Create New Consultas">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($consultasObjects) == 0)
            <div class="panel-body text-center">
                <h4>No Consultas Available.</h4>
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
                            <th>Padecimiento Actual</th>
                            <th>Atendido</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($consultasObjects as $consultas)
                        <tr>
                            <td>{{ $consultas->diagnostico }}</td>
                            <td>{{ $consultas->receta }}</td>
                            <td>{{ $consultas->fecha }}</td>
                            <td>{{ $consultas->arribo }}</td>
                            <td>{{ $consultas->egreso }}</td>
                            <td>{{ $consultas->tiempo_consulta }}</td>
                            <td>{{ optional($consultas->paciente->persona)->apellido}}</td>
                            <td>{{ optional($consultas->medico)->id }}</td>
                            <td>{{ optional($consultas->guardia)->id }}</td>
                            <td>{{ optional($consultas->prioridad)->nombre }}</td>
                            <td>{{ $consultas->padecimiento_actual }}</td>
                            <td>{{ $consultas->atendido }}</td>

                            <td>

                                <form method="POST" action="{!! route('consultas.consulta.destroy', $consultas->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('consultas.consulta.show', $consultas->id ) }}" class="btn btn-info" title="Show Consultas">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('consultas.consulta.edit', $consultas->id ) }}" class="btn btn-primary" title="Edit Consultas">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Consultas" onclick="return confirm(&quot;Click Ok to delete Consultas.&quot;)">
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
            {!! $consultasObjects->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection