<div class="form-group">
    <input class="form-control" id="paciente_id" minlength="1" name="paciente_id" type="hidden" value="{{ $consulta->paciente_id }}">
    </input>
    <input class="form-control" id="guardia_id" minlength="1" name="guardia_id" type="hidden" value="{{ $consulta->guardia_id }}">
    </input>
    <input class="form-control" id="medico_id" minlength="1" name="medico_id" type="hidden" value="{{ $medicos[0]->id }}">
    </input>

</div>
<div class="form-group {{ $errors->has('fecha') ? 'has-error' : '' }}">
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Fecha
                    </h5>
                    <p class="card-text">
                        <h3>
                            {{ $consulta->fecha }} // 
                           
                        </h3>
                        <input class="form-control" id="fecha" minlength="1" name="fecha" readonly="readonly" type="hidden" value="{{ $consulta->fecha }}">
                        </input>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Arribo
                    </h5>
                    <p class="card-text">
                        <h3>
                            {{ $consulta->arribo }}
                        </h3>
                        <input class="form-control" id="arribo" minlength="1" name="arribo" readonly="readonly" type="hidden" value="{{ $consulta->arribo}}">
                        </input>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Paciente
                    </h5>
                    <p class="card-text">
                        <h3>
                            {{ $consulta->paciente->persona->apellido }}  {{ $consulta->paciente->persona->nombre}}
                        </h3>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Padecimiento Actual
                    </h5>
                    <p class="card-text">
                        <h3>
                            {{ $consulta->padecimiento_actual}}
                        </h3>
                        <input class="form-control" id="padecimiento_actual" minlength="1" name="padecimiento_actual" readonly="readonly" type="hidden" value="{{ $consulta->padecimiento_actual}}">
                        </input>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Antecedentes Familiares
                    </h5>
                    <p class="card-text">
                        <h3>
                            {{ $consulta->paciente->antecedentes_familiares}}
                        </h3>
                        <input class="form-control" id="padecimiento_actual" minlength="1" name="padecimiento_actual" readonly="readonly" type="hidden" value="{{ $consulta->padecimiento_actual}}">
                        </input>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Antecedentes Patologico
                    </h5>
                    <p class="card-text">
                        <h3>
                            {{ $consulta->paciente->antecedentes_patologico}}
                        </h3>
                        <input class="form-control" id="padecimiento_actual" minlength="1" name="padecimiento_actual" readonly="readonly" type="hidden" value="{{ $consulta->padecimiento_actual}}">
                        </input>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        Antecedentes Nopatologico
                    </h5>
                    <p class="card-text">
                        <h3>
                            {{ $consulta->paciente->antecedentes_nopatologico}}
                        </h3>
                        <input class="form-control" id="padecimiento_actual" minlength="1" name="padecimiento_actual" readonly="readonly" type="hidden" value="{{ $consulta->padecimiento_actual}}">
                        </input>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <br>

<div class="form-group {{ $errors->has('diagnostico') ? 'has-error' : '' }}">
    <label class="col-md-2 control-label" for="diagnostico">
        Diagnostico
    </label>
    <div class="col-md-12">
        <input class="form-control" id="diagnostico" minlength="1" name="diagnostico" placeholder="Enter diagnostico here..." type="text" value="{{ old('diagnostico', optional($consulta)->diagnostico) }}">
            {!! $errors->first('diagnostico', '
            <p class="help-block">
                :message
            </p>
            ') !!}
        </input>
    </div>
</div>
<div class="form-group {{ $errors->has('receta') ? 'has-error' : '' }}">
    <label class="col-md-2 control-label" for="receta">
        Receta
    </label>
    <div class="col-md-12">
        <input class="form-control" id="receta" minlength="1" name="receta" placeholder="Enter receta here..." type="text" value="{{ old('receta', optional($consulta)->receta) }}">
            {!! $errors->first('receta', '
            <p class="help-block">
                :message
            </p>
            ') !!}
        </input>
    </div>
</div>
<div class="form-group {{ $errors->has('prioridad_id') ? 'has-error' : '' }}">
    <label class="col-md-2 control-label" for="prioridad_id">
        Prioridad
    </label>
    <div class="col-md-12">
        <input class="form-control" id="prioridad_id" minlength="1" name="prioridad_id" readonly="readonly" type="text" value="{{ old('receta', optional($consulta)->prioridad_id) }}">
            {!! $errors->first('receta', '
            <p class="help-block">
                :message
            </p>
            ') !!}
        </input>
    </div>
</div>
<div class="form-group {{ $errors->has('padecimiento_actual') ? 'has-error' : '' }}">
    <label class="col-md-2 control-label" for="padecimiento_actual">
        Padecimiento Actual
    </label>
    <div class="col-md-12">
        <input class="form-control" id="padecimiento_actual" minlength="1" name="padecimiento_actual" readonly="readonly" type="text" value="{{ old('padecimiento_actual', optional($consulta)->padecimiento_actual) }}">
            {!! $errors->first('padecimiento_actual', '
            <p class="help-block">
                :message
            </p>
            ') !!}
        </input>
    </div>
</div>