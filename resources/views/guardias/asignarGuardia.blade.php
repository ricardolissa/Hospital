@extends('layouts.app')

@section('content')
<!-- Select Especialidad para busqueda -->
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
                    <!-- Select Normal filtrado -->
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-inline">
                                <label class="col-md-2 control-label" for="especialidad">
                                    Especialidad
                                </label>
                                <div class="col-md-10">
                                    <select class="chosen-select" id="especialidades" name="especialidades[]" required="required" style="width: 600px;">
                                        @foreach($especialidades as $especialidad)
                                        <option value="{{$especialidad->id}}">
                                            {{$especialidad->nombre, $especialidad->id }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-info" type="">
                                        <span aria-hidden="true" class="btn btn-primary">
                                            Buscar
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</link>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <label class="col-md-2 control-label">
                    Seleccionar Medico
                </label>
                <form accept-charset="UTF-8" action="{{ route('guardias.guardia.store') }}" class="form-inline" method="POST">
                    <div class="col-md-10">
                        <select class="chosen-select" id="medicoAsignado" multiple="multiple" name="medicoAsignado[]" required="required" style="width: 600px;">
                            @foreach($medicos as $medico)
                            <option value="{{ $medico->medico_id }}">
                                {{$medico->persona->nombre, $medico->persona->apellido }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
                            <label class="col-md-2 control-label" for="fecha">
                                Fecha
                            </label>
                            <br>
                                <input class="form-control" id="fecha" minlength="1" name="fecha" placeholder="Enter fecha here..." type="date" value="">
                                    {!! $errors->first('fecha', '
                                    <p class="help-block">
                                        :message
                                    </p>
                                    ') !!}
                                </input>
                            </br>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <input class="btn btn-success" title="Crear Guardia" type="submit" value="Crear">
                                </input>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
                        $('#medicoAsignado').chosen();
                    });
</script>
@endsection
