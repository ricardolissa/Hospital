
<div class="form-group {{ $errors->has('numero_socio') ? 'has-error' : '' }}">
    <label for="numero_socio" class="col-md-2 control-label">Numero Socio</label>
    <div class="col-md-10">
        <input class="form-control" name="numero_socio" type="text" id="numero_socio" value="{{ old('numero_socio', optional($obrasocial)->numero_socio) }}" minlength="1" placeholder="Enter numero socio here...">
        {!! $errors->first('numero_socio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('plan') ? 'has-error' : '' }}">
    <label for="plan" class="col-md-2 control-label">Plan</label>
    <div class="col-md-10">
        <input class="form-control" name="plan" type="text" id="plan" value="{{ old('plan', optional($obrasocial)->plan) }}" minlength="1" placeholder="Enter plan here...">
        {!! $errors->first('plan', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
    <label for="nombre" class="col-md-2 control-label">Nombre</label>
    <div class="col-md-10">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ old('nombre', optional($obrasocial)->nombre) }}" minlength="1" placeholder="Enter nombre here...">
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>

