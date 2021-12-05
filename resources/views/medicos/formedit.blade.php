<input class="form-control" id="persona_id" minlength="1" name="persona_id" type="hidden" value="{{ $medicos->persona->id }}" hidden>
                        </input>

<div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
    <div align="center" class="col-md-10">
        <label class="col-md-2 control-label" for="foto">
            Foto Actual:
        </label>
        <img src="/images/{{ $medicos->foto }}" width="100">
        </img>
    </div>
    <label class="col-md-2 control-label" for="foto">
        Foto
    </label>
    <div class="col-md-12">
        <input class="form-control" id="foto" minlength="1" name="foto" type="file" value=" {{ $medicos->foto }}">
            {!! $errors->first('foto', '
            <p class="help-block">
                :message
            </p>
            ') !!}
        </input>
    </div>
</div>
<div class="form-group {{ $errors->has('legajo') ? 'has-error' : '' }}">
    <label class="col-md-2 control-label" for="legajo">
        Legajo
    </label>
    <div class="col-md-12">
        <input class="form-control" id="legajo" minlength="1" name="legajo" type="text" disabled value="{{ old('legajo', optional($medicos)->legajo) }}">
            {!! $errors->first('legajo', '
            <p class="help-block">
                :message
            </p>
            ') !!}
        </input>
    </div>
</div>
<div class="form-group {{ $errors->has('matricula') ? 'has-error' : '' }}">
    <label class="col-md-2 control-label" for="matricula">
        Matricula
    </label>
    <div class="col-md-12">
        <input class="form-control" id="matricula" minlength="1" name="matricula" placeholder="Enter matricula here..." type="text" value="{{ old('matricula', optional($medicos)->matricula) }}">
            {!! $errors->first('matricula', '
            <p class="help-block">
                :message
            </p>
            ') !!}
        </input>
    </div>
</div>
<div class="form-group">
    <label class="col-md control-label" for="mespecialidad">
        Especialidades Anteriores
    </label>
    @foreach ($medicos->especialidades as $especialidad)
    <div class="col-md-12">
    
      
                                     {{$especialidad->nombre}} 
      
                                
    </div>
     @endforeach
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="especialidad">
        Seleccionar Especialidad 
    </label>

    <div class="col-md-12">
        <select class="col-md chosen-select" id="especialidades" multiple="multiple" name="especialidades[]">
            @foreach($especialidades as $especialidad)
            <option value="{{$especialidad->id}}">
                        {{$especialidad->nombre, $especialidad->id }}
                    </option>
            @endforeach
        </select>
    </div>
</div>