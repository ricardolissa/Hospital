<div class="form-group {{ $errors->has('persona_id') ? 'has-error' : '' }}">
    <label class="col-md-2 control-label" for="persona_id">
        Medico
    </label>
    <br>
        <div class="col-md-10">
            {{ ($medicos->persona->apellido)}} , {{  ($medicos->persona->nombre) }}
        
        {!! $errors->first('persona_id', '
            <p class="help-block">
                :message
            </p>
            ') !!}
        </div>
    </br>
</div>
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
    <div class="col-md-10">
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
    <div class="col-md-10">
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
    <div class="col-md-10">
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
    <label class="col-md-2 control-label" for="mespecialidad">
        Especialidades Anteriores
    </label>
    <div class="col-md-10">
        @foreach ($medicos->especialidades as $especialidad)
      
                                    / {{$especialidad->nombre}} 
      
                                @endforeach
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="especialidad">
        Seleccionar Especialidad
    </label>
    <div class="col-md-10">
        <select class="col-md-3 chosen-select" id="especialidades" multiple="multiple" name="especialidades[]">
            @foreach($especialidades as $especialidad)
            <option value="{{$especialidad}}">
                {{$especialidad}}
            </option>
            @endforeach
        </select>
    </div>
</div>