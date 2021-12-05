
<div class="form-group {{ $errors->has('diagnostico') ? 'has-error' : '' }}">
    <label for="diagnostico" class="col-md-2 control-label">Diagnostico</label>
    <div class="col-md-10">
        <input class="form-control" name="diagnostico" type="text" id="diagnostico" value="{{ old('diagnostico', optional($consultas)->diagnostico) }}" minlength="1" placeholder="Enter diagnostico here...">
        {!! $errors->first('diagnostico', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('receta') ? 'has-error' : '' }}">
    <label for="receta" class="col-md-2 control-label">Receta</label>
    <div class="col-md-12">
        <input class="form-control" name="receta" type="text" id="receta" value="{{ old('receta', optional($consultas)->receta) }}" minlength="1" placeholder="Enter receta here...">
        {!! $errors->first('receta', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
    <label for="fecha" class="col-md-2 control-label">Fecha</label>
    <div class="col-md-12">
        <input class="form-control" name="fecha" type="date" id="fecha" value="{{ old('fecha', optional($consultas)->fecha) }}" minlength="1" required>
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('arribo') ? 'has-error' : '' }}">
    <label for="arribo" class="col-md-2 control-label">Arribo</label>
    <div class="col-md-12">
        <input class="form-control" name="arribo" type="text" id="arribo" value="{{ old('arribo', optional($consultas)->arribo) }}" minlength="1" placeholder="Enter arribo here...">
        {!! $errors->first('arribo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('egreso') ? 'has-error' : '' }}">
    <label for="egreso" class="col-md-2 control-label">Egreso</label>
    <div class="col-md-12">
        <input class="form-control" name="egreso" type="text" id="egreso" value="{{ old('egreso', optional($consultas)->egreso) }}" minlength="1" placeholder="Enter egreso here...">
        {!! $errors->first('egreso', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tiempo_consulta') ? 'has-error' : '' }}">
    <label for="tiempo_consulta" class="col-md-2 control-label">Tiempo Consulta</label>
    <div class="col-md-12">
        <input class="form-control" name="tiempo_consulta" type="text" id="tiempo_consulta" value="{{ old('tiempo_consulta', optional($consultas)->tiempo_consulta) }}" minlength="1" placeholder="Enter tiempo consulta here...">
        {!! $errors->first('tiempo_consulta', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('paciente_id') ? 'has-error' : '' }}">
    <label for="paciente_id" class="col-md-2 control-label">Paciente</label>
    <div class="col-md-12">
        <select class="form-control" id="paciente_id" name="paciente_id">
        	    
        	@foreach ($pacientes as $key => $paciente)
			    <option value={{$paciente->id  }}>
			    	{{ $paciente->persona->nombre }} {{ $paciente->persona->apellido }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('paciente_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('medico_id') ? 'has-error' : '' }}">
    <label for="medico_id" class="col-md-2 control-label">Medico</label>
    <div class="col-md-12">
        <select class="form-control" id="medico_id" name="medico_id">
        	   
        	@foreach ($medicos as $key => $medico)
			    <option value={{ $medico->id }}>
			    	{{ $medico->persona->nombre }} {{ $medico->persona->apellido }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('medico_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('guardia_id') ? 'has-error' : '' }}">
    <label for="guardia_id" class="col-md-2 control-label">Guardia</label>
    <div class="col-md-12">
        <select class="form-control" id="guardia_id" name="guardia_id">
        	  
        	@foreach ($guardias as $key => $guardium)
			    <option value={{ $guardium->id}}>
			    	{{ $guardium->fecha}}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('guardia_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('prioridad_id') ? 'has-error' : '' }}">
    <label for="prioridad_id" class="col-md-2 control-label">Prioridad</label>
    <div class="col-md-12">
        <select class="form-control" id="prioridad_id" name="prioridad_id">
        	  
        	@foreach ($prioridads as $key => $prioridad)
			    <option value={{ $prioridad->id}}>
			    	{{ $prioridad->nombre }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('prioridad_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('padecimiento_actual') ? 'has-error' : '' }}">
    <label for="padecimiento_actual" class="col-md-2 control-label">Padecimiento Actual</label>
    <div class="col-md-12">
        <input class="form-control" name="padecimiento_actual" type="text" id="padecimiento_actual" value="{{ old('padecimiento_actual', optional($consultas)->padecimiento_actual) }}" minlength="1" placeholder="Enter padecimiento actual here...">
        {!! $errors->first('padecimiento_actual', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('atendido') ? 'has-error' : '' }}">
    <label for="atendido" class="col-md-2 control-label">Atendido</label>
    <div class="col-md-12">
        <input class="form-control" name="atendido" type="text" id="atendido" value="{{ old('atendido', optional($consultas)->atendido) }}" minlength="1" placeholder="Enter padecimiento actual here...">
        {!! $errors->first('atendido', '<p class="help-block">:message</p>') !!}
    </div>
</div>

