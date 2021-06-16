<div class="form-group {{ $errors->has('persona_id') ? 'has-error' : '' }}">
    <label class="col-md-2 control-label" for="persona_id">
        Persona
    </label>
    <div class="col-md-10">
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
                        <input class="form-control" id="persona_id" minlength="1" name="persona_id" type="hidden" value="{{ $persona->id }}">
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
        <div class="col-md-10">
            <input class="form-control" name="foto" type="file" value="">
            </input>
        </div>
    </div>
    <div class="form-group {{ $errors->has('legajo') ? 'has-error' : '' }}">
        <label class="col-md-2 control-label" for="legajo">
            Legajo
        </label>
        <div class="col-md-10">
            <input class="form-control" id="legajo" minlength="1" name="legajo" type="text" disabled value="">
                {!! $errors->first('legajo', '
                <p class="help-block">
                    :message
                </p>
                ') !!}
            </input>
        </div>
    </div>
    <div class="form-group {{ $errors->has('matricula') ? 'has-error' : '' }}">
        <label class="col-md-2 control-label" for="matricula">
            Matricula
        </label>
        <div class="col-md-10">
            <input class="form-control" id="matricula" minlength="1" name="matricula" placeholder="Enter matricula here..." type="text" value="{{ old('matricula', optional($medicos)->matricula) }}">
                {!! $errors->first('matricula', '
                <p class="help-block">
                    :message
                </p>
                ') !!}
            </input>
        </div>
    </div>

    <!-- Select Multiple -->
    <link href="/mselect/chosen.min.css" rel="stylesheet">
    <script src="/mselect/jquery-3.6.0.min.js" type="text/javascript">
    </script>
    <script src="/mselect/chosen.jquery.min.js" type="text/javascript" defer="">
    </script>
    <div class="form-group">
        <label class="col-md-2 control-label" for="especialidad">
            Especialidad
        </label>
        <div class="col-md-10">
            <select class="chosen-select" id="especialidades" multiple="multiple" name="especialidades[]" required="required" style="width: 600px;">
                @foreach($especialidades as $especialidad)
                <option value="{{$especialidad->id}}">
                    {{$especialidad->nombre, $especialidad->id }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <script type="text/javascript">
                    $(document).ready(function(){
                        $('#especialidades').chosen();
                    });

                </script>
    <!-- fin select Multiple-->
</div>