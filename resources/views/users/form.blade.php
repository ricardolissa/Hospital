
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($user)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($user)->email) }}" placeholder="Enter email here...">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">Password</label>
    <div class="col-md-10">
        <input class="form-control" name="password" type="password" id="password" value="{{ old('password', optional($user)->password) }}" placeholder="Enter password here...">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('role_id') ? 'has-error' : '' }}">
    <label for="role_id" class="col-md-2 control-label">Role</label>
    <div class="col-md-10">
        <select class="form-control" id="role_id" name="role_id">
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

