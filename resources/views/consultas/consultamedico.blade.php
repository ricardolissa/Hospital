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
                            <th>Fecha/Arribo</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Prioridad</th>
                            <th>Padecimiento Actual</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($consultas as $consulta)
                        <tr>
                            <td>{{ $consulta->arribo }}</td>
                            <td>{{ optional($consulta->paciente->persona)->apellido }}</td>
                            <td>{{ optional($consulta->paciente->persona)->nombre}}</td>
                            <td>{{ optional($consulta->prioridad)->nombre }}</td>
                            <td>{{ $consulta->padecimiento_actual }}</td>

                            <td>

                            

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                      
                                        <a href="{{ route('consultas.consulta.consultamedicoedit', $consulta->id ) }}" class="btn btn-primary" title="Edit Consulta">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Seleccionar</span>
                                        </a>.

                                           <a href="" class="btn btn-danger" title="No atendido Consulta">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">No atendido</span>
                                        </a>

                                       
                                    </div>

                            
                                
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