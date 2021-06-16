<div class="form-group {{ $errors->has('paciente_id') ? 'has-error' : '' }}">
    
    <label for="paciente_id" class="col-md-1 control-label">Nombre:</label>
    <label for="paciente_apellido" class="col-md-1 control-label">{{ $pacientes->persona->apellido }}</label>
    <label for="paciente_nombre" >{{ $pacientes->persona->nombre }}</label>
    
   <br><br>
    <label class="col-md-2 control-label">DNI:</label>
    <label for="paciente_dni" >{{ $pacientes->persona->dni }}</label>

    <div class="col-md-10">
        <input class="form-control" name="paciente_id" type="text" id="paciente_id" value="{{  $pacientes->id }}" minlength="1" readonly="readonly"  style="visibility:hidden">
        {!! $errors->first('paciente_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
     
    

<div class="form-group {{ $errors->has('pacienteadecimiento_actual') ? 'has-error' : '' }}">
    <label for="padecimiento_actual" class="col-md-2 control-label">Padecimiento Actual</label>
    <div class="col-md-10">
        <input class="form-control" name="padecimiento_actual" type="text" id="padecimiento_actual" value="{{ old('padecimiento_actual', optional($consulta)->padecimiento_actual) }}" minlength="1" placeholder="Enter padecimiento actual here...">
        {!! $errors->first('padecimiento_actual', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('prioridad_id') ? 'has-error' : '' }}">
    <label for="prioridad_id" class="col-md-2 control-label">Prioridad</label>
    <div class="col-md-10">
        <select class="form-control" id="prioridad_id" name="prioridad_id">
                <option value="" style="display: none;" {{ old('prioridad_id', optional($consulta)->prioridad_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select prioridad</option>
            @foreach ($prioridads as $key => $prioridad)
                <option value="{{ $key }}" {{ old('prioridad_id', optional($consulta)->prioridad_id) == $key ? 'selected' : '' }}>
                    {{ $prioridad }}
                </option>
            @endforeach
        </select>
        
        {!! $errors->first('prioridad_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <label for="arribo" class="col-md-2 control-label">Arribo</label>
    <div class="col-md-10">
        <input class="form-control" name="arribo" type="text" id="arribo" value="{{  $now }}" minlength="1" readonly="readonly">
        {!! $errors->first('arribo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <input class="form-control" name="fecha" type="text" id="fecha" value="{{  $fecha }}" minlength="1" readonly="readonly" style="visibility:hidden">
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div>