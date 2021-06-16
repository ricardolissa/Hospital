@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">
                <strong>
                    MEDICO
                </strong>
            </h1>
            <hr>
                <div class="profile-card-6">
                    <img class="img img-responsive" src="/images/{{$medicos->foto  }}">
                        <div class="profile-name">
                            {{ ($medicos->persona->apellido)}}
                            <br>
                                {{  ($medicos->persona->nombre) }}
                            </br>
                        </div>
                        <div class="profile-position">
                            @foreach ($medicos->especialidades as $especialidad)
      
                                     {{$especialidad->nombre}}
                            <br>
                                @endforeach
                            </br>
                        </div>
                        <div class="profile-overview">
                            <div class="profile-overview">
                                <div class="row text-center">
                                </div>
                                <div class="col-xs-4">
                                    <h3>
                                        {{ $medicos->matricula }}
                                    </h3>
                                    <p>
                                        Matricula
                                    </p>
                                </div>
                                <div class="col-xs-4">
                                    <h3>
                                        {{ $medicos->legajo }}
                                    </h3>
                                    <p>
                                        Legajo
                                    </p>
                                </div>
                            </div>
                        </div>
                    </img>
                </div>
            </hr>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div align="center">
            
                <form accept-charset="UTF-8" action="{!! route('medicos.medicos.destroy', $medicos->id) !!}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <div class="btn-group btn-group-xs" role="group">
                            <a class="btn btn-primary" href="{{ route('medicos.medicos.index') }}" title="Mostrar todos los Medicos">
                                <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                    Mostrar
                                </span>
                            </a>
                            <a class="btn btn-success" href="{{ route('medicos.medicos.create') }}" title="Crear Nuevo Medico">
                                <span aria-hidden="true" class="glyphicon glyphicon-plus">
                                    Crear
                                </span>
                            </a>
                            <a class="btn btn-primary" href="{{ route('medicos.medicos.edit', $medicos->id ) }}" title="Editar Medico">
                                <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                    Editar
                                </span>
                            </a>
                            <button class="btn btn-danger" onclick='return confirm("Delete Medicos??")' title="Borrar Medico" type="submit">
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
@endsection
