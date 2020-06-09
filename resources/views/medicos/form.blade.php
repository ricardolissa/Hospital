
<div class="form-group {{ $errors->has('persona_id') ? 'has-error' : '' }}">
    <label for="persona_id" class="col-md-2 control-label">Persona</label>
    <div class="col-md-10">
        <select class="form-control" id="persona_id" name="persona_id">
        	    <option value="" style="display: none;" {{ old('persona_id', optional($medicos)->persona_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select persona</option>
        	@foreach ($personas as $key => $persona)

			    <option value="{{ $key }}" {{ old('persona_id', optional($medicos)->persona_id) == $key ? 'selected' : '' }}>
			    	{{ $persona }}
			    </option>
               
			@endforeach
        </select>
        
        {!! $errors->first('persona_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

 
<div class="form-group {{ $errors->has('foto') ? 'has-error' : '' }}">
    <label for="foto" class="col-md-2 control-label">Foto</label>
    <div class="col-md-10">
        <input class="form-control" name="foto" type="text" id="foto" value="{{ old('foto', optional($medicos)->foto) }}" minlength="1" placeholder="Enter foto here...">
        {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('legajo') ? 'has-error' : '' }}">
    <label for="legajo" class="col-md-2 control-label">Legajo</label>
    <div class="col-md-10">
        <input class="form-control" name="legajo" type="text" id="legajo" value="{{ old('legajo', optional($medicos)->legajo) }}" minlength="1" placeholder="Enter legajo here...">
        {!! $errors->first('legajo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('matricula') ? 'has-error' : '' }}">
    <label for="matricula" class="col-md-2 control-label">Matricula</label>
    <div class="col-md-10">
        <input class="form-control" name="matricula" type="text" id="matricula" value="{{ old('matricula', optional($medicos)->matricula) }}" minlength="1" placeholder="Enter matricula here...">
        {!! $errors->first('matricula', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <label for="especialidad" class="col-md-2 control-label">Especialidad</label>
    <div class="col-md-10">
      
       <select multiple="multiple" name="especialidad[]" id="especialidad">

        
          
           <option value="" style="display: none;" {{ old('especialidads', optional($medicos)->especialidads ?: '') == '' ? 'selected' : '' }} disabled selected>Select persona</option>
            @foreach ($especialidads as $key => $especialidad)

                <option value="{{ $key }}" {{ old('especialidads', optional($medicos)->especialidads) == $key ? 'selected' : '' }}>
                    {{ $especialidad }}
                </option>
               
            @endforeach
           
        
    </select>
    </div>
</div>