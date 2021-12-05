<div class="form-group {{ $errors->has('persona_id') ? 'has-error' : '' }}">
    <label class="col-md-2 control-label" for="persona_id">
        Persona
    </label>
    <div class="col-md-12">
        <table class="table table-hover table-striped">
            <tbody>
                <tr>
                    <td>
                        Nombre
                    </td>
                    <td>
                        Apellido
                    </td>
                    <td>
                        Dni
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
                    <td>
                        {{ $persona->dni }}
                        <input class="form-control" id="persona_id" minlength="1" name="persona_id" type="hidden" value="{{ $persona->id }}" required>
                        </input>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label" for="foto">
            Foto
        </label>
        <div class="col-md-12">
            <input class="form-control" name="foto" type="file" value="">
            </input>
        </div>
    </div>
    <div class="form-group {{ $errors->has('legajo') ? 'has-error' : '' }}">
        
        <div class="col-md-12">
            <input class="form-control" id="legajo" minlength="1" name="legajo" type="hidden" disabled value="">
            </input>
        </div>
    </div>
</div>