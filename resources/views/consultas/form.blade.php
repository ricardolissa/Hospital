
<div class="form-group {{ $errors->has('diagnostico') ? 'has-error' : '' }}">
    <label for="diagnostico" class="col-md-2 control-label">Diagnostico</label>
    <div class="col-md-10">
        <input class="form-control" name="diagnostico" type="text" id="diagnostico" value="{{ old('diagnostico', optional($consulta)->diagnostico) }}" minlength="1" placeholder="Enter diagnostico here...">
        {!! $errors->first('diagnostico', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('receta') ? 'has-error' : '' }}">
    <label for="receta" class="col-md-2 control-label">Receta</label>
    <div class="col-md-10">
        <input class="form-control" name="receta" type="text" id="receta" value="{{ old('receta', optional($consulta)->receta) }}" minlength="1" placeholder="Enter receta here...">
        {!! $errors->first('receta', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
    <label for="fecha" class="col-md-2 control-label">Fecha</label>
    <div class="col-md-10">
        <input class="form-control" name="fecha" type="date" id="fecha" value="{{ old('fecha', optional($consulta)->fecha) }}" minlength="1" placeholder="Enter fecha here...">
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('arribo') ? 'has-error' : '' }}">
    <label for="egreso" class="col-md-2 control-label">Arribo</label>
    <div class="col-md-10">
    <input class="form-control" name="arribo" id="arribo" value="{{ old('arribo', optional($consulta)->arribo) }}" type="datetime-local"  min="2017-06-01T08:00" max="2050-06-30T16:30"
           pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" required>
    <span class="validity"></span>
    {!! $errors->first('arribo', '<p class="help-block">:message</p>') !!}
  <input type="hidden" id="timezone" name="timezone" value="-08:00">
  </div>
</div>


<div class="form-group {{ $errors->has('egreso') ? 'has-error' : '' }}">
    <label for="egreso" class="col-md-2 control-label">Egreso</label>
    <div class="col-md-10">
    <input class="form-control" name="egreso" id="egreso" value="{{ old('egreso', optional($consulta)->egreso) }}" type="datetime-local"  min="2017-06-01T08:00" max="2050-06-30T16:30"
           pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}" required>
    <span class="validity"></span>
    {!! $errors->first('egreso', '<p class="help-block">:message</p>') !!}
  <input type="hidden" id="timezone" name="timezone" value="-08:00">
  </div>
</div>










<div class="form-group {{ $errors->has('tiempo_consulta') ? 'has-error' : '' }}">
    <label for="tiempo_consulta" class="col-md-2 control-label">Tiempo Consulta</label>
    <div class="col-md-10">
        <input class="form-control" name="tiempo_consulta" type="time" id="tiempo_consulta" value="{{ old('tiempo_consulta', optional($consulta)->tiempo_consulta) }}" minlength="1"   required>
        {!! $errors->first('tiempo_consulta', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('paciente_id') ? 'has-error' : '' }}">
    <label for="paciente_id" class="col-md-2 control-label">Paciente</label>
    <div class="col-md-10">
        <select class="form-control" id="paciente_id" name="paciente_id">
        	    <option value="" style="display: none;" {{ old('paciente_id', optional($consulta)->paciente_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select paciente</option>
        	@foreach ($pacientes as $key => $paciente)
			    <option value="{{ $key }}" {{ old('paciente_id', optional($consulta)->paciente_id) == $key ? 'selected' : '' }}>
			    	{{ $paciente }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('paciente_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('medico_id') ? 'has-error' : '' }}">
    <label for="medico_id" class="col-md-2 control-label">Medico</label>
    <div class="col-md-10">
        <select class="form-control" id="medico_id" name="medico_id">
        	    <option value="" style="display: none;" {{ old('medico_id', optional($consulta)->medico_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select medico</option>
        	@foreach ($medicos as $key => $medico)
			    <option value="{{ $key }}" {{ old('medico_id', optional($consulta)->medico_id) == $key ? 'selected' : '' }}>
			    	{{ $medico }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('medico_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('guardia_id') ? 'has-error' : '' }}">
    <label for="guardia_id" class="col-md-2 control-label">Guardia</label>
    <div class="col-md-10">
        <select class="form-control" id="guardia_id" name="guardia_id">
        	    <option value="" style="display: none;" {{ old('guardia_id', optional($consulta)->guardia_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select guardia</option>
        	@foreach ($guardia as $key => $guardium)
			    <option value="{{ $key }}" {{ old('guardia_id', optional($consulta)->guardia_id) == $key ? 'selected' : '' }}>
			    	{{ $guardium }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('guardia_id', '<p class="help-block">:message</p>') !!}
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

