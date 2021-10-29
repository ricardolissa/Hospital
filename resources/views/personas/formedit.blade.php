
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
    <label for="nombre" class="col-md-2 control-label">Nombre</label>
    <div class="col-md-12">
        <input class="form-control" name="nombre" type="text" id="nombre" value="{{ old('nombre', optional($persona)->nombre) }}" minlength="1" placeholder="Ingrese nombre aqui..." required>
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('apellido') ? 'has-error' : '' }}">
    <label for="apellido" class="col-md-2 control-label">Apellido</label>
    <div class="col-md-12">
        <input class="form-control" name="apellido" type="text" id="apellido" value="{{ old('apellido', optional($persona)->apellido) }}" minlength="1" placeholder="Ingrese apellido aqui..." required>
        {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('dni') ? 'has-error' : '' }}">
    <label for="dni" class="col-md-12 control-label">DNI : {{ $persona->dni}}</label>
    <div class="col-md-12">
        <input class="form-control" name="dni" type="text" id="dni" value="{{ old('dni', optional($persona)->dni) }}" minlength="1" placeholder="Ingrese DNI aqui..." hidden="">
        {!! $errors->first('dni', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-12 control-label">Email : {{ $persona->email}}</label>
    <div class="col-md-12">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($persona)->email) }}" placeholder="Ingrese email aqui..." hidden="">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fecha_nacimiento') ? 'has-error' : '' }}">
    <label for="fecha_nacimiento" class="col-md-2 control-label">Fecha Nacimiento</label>
    <div class="col-md-12">
        <input class="form-control" name="fecha_nacimiento" type="date" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', optional($persona)->fecha_nacimiento) }}" minlength="1" placeholder="Ingrese fecha nacimiento aqui..." required>
        {!! $errors->first('fecha_nacimiento', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('edad') ? 'has-error' : '' }}">
    <label for="edad" class="col-md-2 control-label">Edad</label>
    <div class="col-md-12">
        <input class="form-control" name="edad" type="text" id="edad" value="{{ old('edad', optional($persona)->edad) }}" minlength="1" placeholder="Ingrese Edad aqui..." required>
        {!! $errors->first('edad', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('telefono1') ? 'has-error' : '' }}">
    <label for="telefono1" class="col-md-2 control-label">Telefono</label>
    <div class="col-md-12">
        <input class="form-control" name="telefono1" type="text" id="telefono1" value="{{ old('telefono1', optional($persona)->telefono1) }}" minlength="1" placeholder="Ingrese Telefono aqui..." required>
        {!! $errors->first('telefono1', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('telefono2') ? 'has-error' : '' }}">
    <label for="telefono2" class="col-md-2 control-label">Telefono</label>
    <div class="col-md-12">
        <input class="form-control" name="telefono2" type="text" id="telefono2" value="{{ old('telefono2', optional($persona)->telefono2) }}" minlength="1" placeholder="Ingrese Telefono aqui...">
        {!! $errors->first('telefono2', '<p class="help-block">:message</p>') !!}
    </div>
</div>