

<div class="form-group {{ $errors->has('persona_id') ? 'has-error' : '' }}">
    
    <div class="col-md-12">
        
    </div>

<div class="form-group">
    <label class="col-md control-label" for="rol_actual">
    <h3>    Rol actual: {{$user->roles->name}} </h3>
    </label>                
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">Password</label>
    <div class="col-md-12">
        <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($user)->password) }}" placeholder="Enter password here...">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <label class="col-md-2 control-label" for="role_id">
        Seleccionar Rol 
    </label>

    <div class="col-md-12">
        <select class="col-md chosen-select" id="role_id" name="role_id">
            @foreach($roles as $rol)
            <option value="{{$rol->id}}">
                        {{$rol->name, $rol->id }}
                    </option>
            @endforeach
        </select>
    </div>
</div>