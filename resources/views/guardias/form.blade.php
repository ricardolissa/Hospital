
<div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
    <label for="fecha" class="col-md-2 control-label">Fecha</label>
    <div class="col-md-10">
        <input class="form-control" name="fecha" type="date" id="fecha" value="{{ old('fecha', optional($guardia)->fecha) }}" minlength="1" placeholder="Enter fecha here...">
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div>


