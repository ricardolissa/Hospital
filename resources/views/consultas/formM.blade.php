


<div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
    <label for="fecha" class="col-md-2 control-label">Fecha : {{ $consulta->fecha}} </label>
    <div class="col-md-10">
        <input class="form-control" name="fecha" type="text" id="fecha" value="{{  $consulta->fecha }}" minlength="1" readonly="readonly"  style="visibility:hidden">
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('arribo') ? 'has-error' : '' }}">
    <label for="arribo" class="col-md-4 control-label">Arribo : {{ $consulta->arribo}} </label>
    <div class="col-md-10">
        <input class="form-control" name="arribo" type="text" id="arribo" value="{{  $consulta->arribo }}" minlength="1" readonly="readonly"  style="visibility:hidden">
        {!! $errors->first('arribo', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group {{ $errors->has('paciente_id') ? 'has-error' : '' }}">
    <label for="nombre" class="col-md-4 control-label">Nombre: {{ $consulta->paciente->persona->nombre}} </label>
</div>

<div class="form-group {{ $errors->has('paciente_id') ? 'has-error' : '' }}">
    <label for="apellido" class="col-md-4 control-label">Apellido : {{ $consulta->paciente->persona->apellido}} </label>
</div>


<div class="form-group {{ $errors->has('padecimiento_actual') ? 'has-error' : '' }}">
    <label for="arribo" class="col-md-4 control-label">Padecimiento Actual : {{ $consulta->padecimiento_actual}} </label>
    <div class="col-md-10">
        <input class="form-control" name="padecimiento_actual" type="text" id="arribo" value="{{  $consulta->padecimiento_actual }}" minlength="1" readonly="readonly"  style="visibility:hidden">
        {!! $errors->first('padecimiento_actual', '<p class="help-block">:message</p>') !!}
    </div>

</div>

<div class="form-group {{ $errors->has('diagnostico') ? 'has-error' : '' }}">
    <label for="diagnostico" class="col-md-2 control-label">Diagnostico Muchos</label>
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







<div class="form-group {{ $errors->has('prioridad_id') ? 'has-error' : '' }}">
    <label for="prioridad_id" class="col-md-2 control-label">Prioridad</label>
    <div class="col-md-10">
        <select class="form-control" id="prioridad_id" name="prioridad_id" readonly="readonly">
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

<div class="form-group {{ $errors->has('padecimiento_actual') ? 'has-error' : '' }}">
    <label for="padecimiento_actual" class="col-md-2 control-label">Padecimiento Actual</label>
    <div class="col-md-10">
        <input class="form-control" name="padecimiento_actual" type="text" id="padecimiento_actual" value="{{ old('padecimiento_actual', optional($consulta)->padecimiento_actual) }}" minlength="1" readonly="readonly">
        {!! $errors->first('padecimiento_actual', '<p class="help-block">:message</p>') !!}
    </div>
</div>

