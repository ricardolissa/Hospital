<div class="form-group {{ $errors->has('persona_id') ? 'has-error' : '' }}">
    
    <div class="col-md-12">
        <table class="table table-hover table-striped">
            <tbody align="center">
                <tr>
                    <td>
                        Nombre
                    </td>
                    <td>
                        Apellido
                    </td>
                    <td>
                    Email
                    </td>
                    
                </tr>
                @foreach($personas as $persona)
                <tr>
                    <td>
                        {{ $persona->nombre }}
                    </td>
                    <td>
                        {{ $persona->apellido }}
                    </td>
                    <td>{{ $persona->email }}</td>
                    
                                         <input class="form-control" id="persona_id" minlength="1" name="persona_id" type="hidden" value="{{ $persona->id }}">
                        </input>
                        <input class="form-control" name="name" type="text" id="name" value="{{ $persona->nombre }}" hidden="">
     
        <input class="form-control" name="email" type="email" id="email" value="{{ $persona->email }}" hidden="">
        
                    
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>





<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">Password</label>
    <div class="col-md-12">
        <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($user)->password) }}" placeholder="Enter password here..." required>
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>




<div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
    <label for="role_id" class="col-md-2 control-label">Role</label>
    <div class="col-md-12">
        <select class="form-control" id="role_id" name="role_id" required>
        	    <option value="" style="display: none;" {{ old('role_id', optional($user)->role_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select role</option>
        	@foreach ($roles as $key => $role)
			    <option value="{{ $key }}" {{ old('role_id', optional($user)->role_id) == $key ? 'selected' : '' }}>
			    	{{ $role }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

