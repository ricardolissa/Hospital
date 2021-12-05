@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ $medicos->persona->apellido }} {{ $medicos->persona->nombre }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div align="center" class="row">
        <div class="col-md-12">
            <div class="panel-body">
                <dl class="dl-horizontal">
                    <dt>
                        <img src="/images/{{ $medicos->foto }}" width="100"/>
                    </dt>
                    <br>
                        <dt>
                            <h3>
                                Matricula : {{ $medicos->matricula }}
                            </h3>
                        </dt>
                        <dt>
                            <h3>
                                Legajo : {{ $medicos->legajo }}
                            </h3>
                        </dt>
                        <dt>
                            <h3>
                                @foreach ($medicos->especialidades as $especialidad)
      
                                     {{$especialidad->nombre}}
                                <br>
                                    @endforeach
                                </br>
                            </h3>
                        </dt>
                    </br>
                </dl>
            </div>
        </div>
    </div>
    <div align="center" class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <form accept-charset="UTF-8" action="{!! route('medicos.medicos.destroy', $medicos->id) !!}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <div class="btn-group btn-group-xs" role="group">
                            <a class="btn btn-primary" href="{{ route('medicos.medicos.index') }}" title="Mostrar todos los Medicos">
                                <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                                    Volver
                                </span>
                            </a>
                            <a class="btn btn-success" href="{{ route('medicos.medicos.edit', $medicos->id ) }}" title="Editar Medico">
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
