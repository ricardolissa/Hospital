

<div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
    <label class="col-md-2 control-label" for="fecha">
        Fecha
    </label>
    <div class="col-md-10">
        <input class="form-control" id="fecha" minlength="1" name="fecha" placeholder="Enter fecha here..." type="date" value="{{ old('fecha', optional($guardia)->fecha) }}">
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
        <div class="col-md-10">
            <select class="chosen-select" id="medicoAsignado" multiple="multiple" name="medicoAsignado[]" required="required" style="width: 600px;">
                @foreach($medicos as $medico)
                <option value="{{$medico->id}}">
                    {{$medico->persona->nombre, $medico->persona->id }}
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

