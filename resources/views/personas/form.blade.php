
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
    <label for="nombre" class="col-md-2 control-label">Nombre</label>
    <div class="col-md-10">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ old('nombre', optional($persona)->nombre) }}" minlength="1" placeholder="Enter nombre here...">
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('apellido') ? 'has-error' : '' }}">
    <label for="apellido" class="col-md-2 control-label">Apellido</label>
    <div class="col-md-10">
        <input class="form-control" name="apellido" type="text" id="apellido" value="{{ old('apellido', optional($persona)->apellido) }}" minlength="1" placeholder="Enter apellido here...">
        {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dni') ? 'has-error' : '' }}">
    <label for="dni" class="col-md-2 control-label">Dni</label>
    <div class="col-md-10">
        <input class="form-control" name="dni" type="text" id="dni" value="{{ old('dni', optional($persona)->dni) }}" minlength="1" placeholder="Enter dni here...">
        {!! $errors->first('dni', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($persona)->email) }}" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fecha_nacimiento') ? 'has-error' : '' }}">
    <label for="fecha_nacimiento" class="col-md-2 control-label">Fecha Nacimiento</label>
    <div class="col-md-10">
        <input class="form-control" name="fecha_nacimiento" type="date" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', optional($persona)->fecha_nacimiento) }}" minlength="1" placeholder="Enter fecha nacimiento here...">
        {!! $errors->first('fecha_nacimiento', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('edad') ? 'has-error' : '' }}">
    <label for="edad" class="col-md-2 control-label">Edad</label>
    <div class="col-md-10">
        <input class="form-control" name="edad" type="text" id="edad" value="{{ old('edad', optional($persona)->edad) }}" minlength="1" placeholder="Enter edad here...">
        {!! $errors->first('edad', '<p class="help-block">:message</p>') !!}
    </div>
</div>

