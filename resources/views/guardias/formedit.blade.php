

<div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
    <label class="col-md control-label" for="fecha">
      <h3>  Fecha : {{ $guardia->fecha }}</h3>
    </label>
     <input class="form-control" id="fecha" minlength="1" name="fecha" placeholder="Enter fecha here..." type="date" value="{{ old('fecha', optional($guardia)->fecha) }}" hidden="" required>
            {!! $errors->first('fecha', '
            <p class="help-block">
                :message
            </p>
            ') !!}
        </input>
   
</div>


<br>

<div class="form-group" >
    <label class="col-md-12 control-label" for="mespecialidad">
        <h3>Medicos de Guardia</h3>
    </label>
    <div class="row">
                @foreach ($guardia->medicos as $medico)
                <div class="col-sm-2">
                    <div class="card">
                        <div class="card-body">
                           
                            <p class="card-text">
                               {{$medico->persona->apellido}}, {{$medico->persona->nombre}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>

                 
</div>

<br>


<div class="row">
    <div class="col-md-12">
           
            <link href="/mselect/chosen.min.css" rel="stylesheet">
    <script src="/mselect/jquery-3.6.0.min.js" type="text/javascript">
    </script>
    <script src="/mselect/chosen.jquery.min.js" type="text/javascript" defer="">
    </script>
    <div class="form-group">
        <label class="col-md-12 control-label" >
          <h3> Seleccionar Medico</h3>
        </label>
        <div class="col-md-12">
            <select class="chosen-select" id="medicoAsignado" multiple="multiple" name="medicoAsignado[]"  style="width: 600px;" required>
                @foreach($medicos as $medico)
                <option value="{{$medico->id}}" >
                    {{$medico->persona->apellido}} {{ $medico->persona->nombre }}

                </option>
                @endforeach
            </select>
        </div>
    </div>
    <script type="text/javascript">
                    $(document).ready(function(){
                        $('#medicoAsignado').chosen();
                    });

                </script>
    </div>
</div>

