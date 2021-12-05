

<div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
    <label class="col-md-2 control-label" for="fecha">
        Fecha
    </label>
    <div class="col-md-12">
        <input class="form-control" id="fecha" minlength="1" name="fecha" placeholder="Enter fecha here..." type="date" value="{{ old('fecha', optional($guardia)->fecha) }}" required>
            {!! $errors->first('fecha', '
            <p class="help-block">
                :message
            </p>
            ') !!}
        </input>
    </div>
</div>



<div class="row">
    <div class="col-md-12">
           
            <link href="/mselect/chosen.min.css" rel="stylesheet">
    <script src="/mselect/jquery-3.6.0.min.js" type="text/javascript">
    </script>
    <script src="/mselect/chosen.jquery.min.js" type="text/javascript" defer="">
    </script>
    <div class="form-group">
        <label class="col-md-2 control-label" >
           Medico
        </label>
        <div class="col-md-12">
            <select class="chosen-select" id="medicoAsignado" multiple="multiple" name="medicoAsignado[]" style="width: 600px;" required>
               
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

