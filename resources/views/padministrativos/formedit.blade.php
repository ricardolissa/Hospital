<div class="form-group {{ $errors->has('persona_id') ? 'has-error' : '' }}">
    <label class="col-md-2 control-label" for="persona_id">
        Administrativo
    </label>
    <br>
        <div class="col-md-10">
            {{ ($padministrativo->persona->apellido)}} , {{  ($padministrativo->persona->nombre) }}
        
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
        <img src="/images/{{ $padministrativo->foto }}" width="100">
        </img>
    </div>
    <label class="col-md-2 control-label" for="foto">
        Foto
    </label>
    <div class="col-md-10">
        <input class="form-control" id="foto" minlength="1" name="foto" type="file" value=" {{ $padministrativo->foto }}">
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
        <input class="form-control" id="legajo" minlength="1" name="legajo" type="text" disabled value="{{ old('legajo', optional($padministrativo)->legajo) }}">
            {!! $errors->first('legajo', '
            <p class="help-block">
                :message
            </p>
            ') !!}
        </input>
    </div>
</div>
