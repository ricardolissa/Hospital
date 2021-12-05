
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Nombre</label>
    <div class="col-md-12">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($role)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
    <label for="descripcion" class="col-md-2 control-label">Descripcion</label>
    <div class="col-md-12">
        <input class="form-control" name="descripcion" type="text" id="descripcion" value="{{ old('descripcion', optional($role)->descripcion) }}" minlength="1" placeholder="Enter descripcion here...">
        {!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
    </div>
</div>

