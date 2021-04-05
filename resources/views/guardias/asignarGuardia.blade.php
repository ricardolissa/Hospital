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
<link href="/mselect/chosen.min.css" rel="stylesheet">
    <script src="/mselect/jquery-3.6.0.min.js" type="text/javascript">
    </script>
    <script defer="" src="/mselect/chosen.jquery.min.js" type="text/javascript">
    </script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading clearfix">
                        <div align="center" class="pull-left">
                            <h1 class="mt-5 mb-5">
                                Asignar Guardia
                            </h1>
                        </div>
                    </div>
                    <!-- Crear Guardia -->
                    <div class="panel-body">
                        <div>
                            @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                                @endforeach
                            </ul>
                            @endif
                            <form accept-charset="UTF-8" action="{{ route('guardias.guardia.store') }}" class="form-horizontal" id="create_guardia_form" method="POST" name="create_guardia_form">
                                {{ csrf_field() }}
            @include ('guardias.formasignar', [
                                        'guardia' => null,
                                      ])
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        


        <!---Busqueda por especialidad -->
        <div class="row">
            <div class="col-md-12">        
                <div>
                    Select: "Especialidad"
                    <form accept-charset="UTF-8" action="{{ route('guardias.guardia.asignarGuardia') }}" class="form-inline pull-right" method="GET">
               <select id="especialidad" multiple="" style="width: 300px;">
                            @foreach($especialidades as $especialidad)
                <option value="{{$especialidad->id}}">
                    {{$especialidad->nombre, $especialidad->id }}
                </option>
                @endforeach
                
                </select>
               
                          
                     </form>
                    <script type="text/javascript">
                        $(document).ready(function(){
                        $('#especialidad').chosen();
                    });
                    </script>
                </div>
                
            </div>
        </div>
    </div>
</link>        







        <!-- Select Multiple filtrado -->
        <div class="row">
            <div class="col-md-12">        
                       Select: "Final " medicos disponibles"
                    <form >
                      <label class="col-md-2 control-label" for="especialidad">
            Especialidad
        </label>
        <div class="col-md-10">
            <select class="chosen-select" id="especialidades" multiple="multiple" name="especialidades[]" required="required" style="width: 600px;">
                @foreach($especialidades as $especialidad)
                <option value="{{$especialidad->id}}">
                    {{$especialidad->nombre, $especialidad->id }}
                </option>
                @endforeach
            </select>
            </div>
              <button class="btn btn-default" type="submit">
                    <span aria-hidden="true" class="btn btn-primary">
                               Buscar
                    </span>
               </button>
    
                    </form>
                    <script type="text/javascript">
                        $(document).ready(function(){
                        $('#medicosdisponibles').chosen();
                    });
                    </script>
                </div>
                
            </div>
        </div>
    </div>
</link>

<div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="Medicos">
                                    Medicos disponibles
                                </label>
                                <div class="col-md-10">
                                    <table class="table table-hover table-striped">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Apellido
                                                </td>
                                                <td>
                                                    Nombre
                                                </td>
                                                <td>
                                                    Especialidad
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                            <tr>
                                                 @foreach($medicos as $medico)
                                                <td>
                                                   A
                                                </td>
                                                <td>
                                                    {{ $medico->medico_id}}
                                                </td>
                                                <td>
                                                     {{ $medico->especialidad_id}}
                                @endforeach
                                        
                                                </td>
                                                <td>
                                                    <form accept-charset="UTF-8" action="" method="POST">
                                                        <input name="_method" type="hidden" value="DELETE">
                                                            {{ csrf_field() }}
                                                            <div class="btn-group btn-group-xs pull-right" role="group">
                                                                <a class="btn btn-info" href="{{ route('guardias.guardia.create'  ) }}" title="Seleccionar">
                                                                    <span aria-hidden="true" class="glyphicon glyphicon-open">
                                                                        Seleccionar
                                                                    </span>
                                                                </a>
                                                            </div>
                                                        </input>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endsection