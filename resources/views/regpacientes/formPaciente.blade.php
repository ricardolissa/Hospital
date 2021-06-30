<div class="form-group {{ $errors->has('persona_id') ? 'has-error' : '' }}">
    <label for="persona_id" class="col-md-2 control-label">Persona</label>
    <div class="col-md-10">
     
        persona 
    </div>
</div>

<div class="form-group {{ $errors->has('obrasocial_id') ? 'has-error' : '' }}">
    <label for="obrasocial_id" class="col-md-2 control-label">Obrasocial</label>
    <div class="col-md-10">
        <select class="form-control" id="obrasocial_id" name="obrasocial_id">
        	    <option value="" style="display: none;" {{ old('obrasocial_id', optional($paciente)->obrasocial_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select obrasocial</option>
        	@foreach ($obrasocials as $key => $obrasocial)
			    <option value="{{ $key }}" {{ old('obrasocial_id', optional($paciente)->obrasocial_id) == $key ? 'selected' : '' }}>
			    	{{ $obrasocial }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('obrasocial_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('antecedentes_familiares') ? 'has-error' : '' }}">
    <label for="antecedentes_familiares" class="col-md-2 control-label">Antecedentes Familiares</label>
    <div class="col-md-10">
        <input class="form-control" name="antecedentes_familiares" type="text" id="antecedentes_familiares" value="{{ old('antecedentes_familiares', optional($paciente)->antecedentes_familiares) }}" minlength="1" placeholder="Enter antecedentes familiares here...">
        {!! $errors->first('antecedentes_familiares', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('antecedentes_patologico') ? 'has-error' : '' }}">
    <label for="antecedentes_patologico" class="col-md-2 control-label">Antecedentes Patologico</label>
    <div class="col-md-10">
        <input class="form-control" name="antecedentes_patologico" type="text" id="antecedentes_patologico" value="{{ old('antecedentes_patologico', optional($paciente)->antecedentes_patologico) }}" minlength="1" placeholder="Enter antecedentes patologico here...">
        {!! $errors->first('antecedentes_patologico', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('antecedentes_nopatologico') ? 'has-error' : '' }}">
    <label for="antecedentes_nopatologico" class="col-md-2 control-label">Antecedentes Nopatologico</label>
    <div class="col-md-10">
        <input class="form-control" name="antecedentes_nopatologico" type="text" id="antecedentes_nopatologico" value="{{ old('antecedentes_nopatologico', optional($paciente)->antecedentes_nopatologico) }}" minlength="1" placeholder="Enter antecedentes nopatologico here...">
        {!! $errors->first('antecedentes_nopatologico', '<p class="help-block">:message</p>') !!}
    </div>
</div>

