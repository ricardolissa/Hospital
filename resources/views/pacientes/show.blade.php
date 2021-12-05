@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ $paciente->persona->apellido }} {{ $paciente->persona->nombre }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row" align="center">
       
            <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                   D.N.I
                                </h5>
                                <p class="card-text">
                                     {{  $paciente->persona->dni}}
                                </p>
                            </div>
                        </div>
                    </div>
            <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                 <h5 class="card-title">
                                   Obra Social
                                </h5>
                                <p class="card-text">
                                     {{  $paciente->obrasocial->nombre}}
                                </p>
                            </div>
                        </div>
            </div>
    </div>  
    <br>    
    <div class="row" align="center">
       
           
            <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                   Antecedentes Familiares
                                </h5>
                                <p class="card-text">
                                     {{ $paciente->antecedentes_familiares }}
                                </p>
                            </div>
                        </div>
            </div>
    </div>
    <br>
    <div class="row" align="center">
       
            <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Antecedentes Patologico
                                </h5>
                                <p class="card-text">
                                    {{ $paciente->antecedentes_patologico }}
                                </p>
                            </div>
                        </div>
                    </div>
            <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    Antecedentes Nopatologico
                                </h5>
                                <p class="card-text">
                                      {{ $paciente->antecedentes_nopatologico }}
                                </p>
                            </div>
                        </div>
            </div>
    </div>
    <br>
    <div class="row" div align="center" >
                <div class="col-md-12">
                    <div class="pull-right">
                        <form accept-charset="UTF-8" action="{!! route('pacientes.paciente.destroy', $paciente->id) !!}" method="POST">
                            <input name="_method" type="hidden" value="DELETE">
                                {{ csrf_field() }}
                                <div class="btn-group btn-group-xs" role="group">
                                    <a class="btn btn-primary" href="{{ route('pacientes.paciente.index') }}" title="Volver">
                                        <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                            Volver
                                        </span>
                                    </a>
                                    <a class="btn btn-success" href="{{ route('pacientes.paciente.edit', $paciente->id ) }}" title="Editar Paciente">
                                        <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                            Editar
                                        </span>
                                    </a>
                                    <button class="btn btn-danger" onclick='return confirm("Delete Paciente??")' title="Borrar Paciente" type="submit">
                                        <span aria-hidden="true" class="glyphicon glyphicon-trash">
                                            Borrar
                                        </span>
                                    </button>
                                </div>
                            </input>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
 @endsection