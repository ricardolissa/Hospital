
<div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
    <label for="numero" class="col-md-2 control-label">Numero</label>
    <div class="col-md-10">
        <input class="form-control" name="numero" type="text" id="numero" value="{{ old('numero', optional($telefono)->numero) }}" minlength="1" placeholder="Enter numero here...">
        {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('persona_id') ? 'has-error' : '' }}">
    <label for="persona_id" class="col-md-2 control-label">Persona</label>
    <div class="col-md-10">
        <select class="form-control" id="persona_id" name="persona_id">
        	    <option value="" style="display: none;" {{ old('persona_id', optional($telefono)->persona_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select persona</option>
        	@foreach ($personas as $key => $persona)
			    <option value="{{ $key }}" {{ old('persona_id', optional($telefono)->persona_id) == $key ? 'selected' : '' }}>
			    	{{ $persona }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('persona_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

