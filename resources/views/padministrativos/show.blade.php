@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Administrativo' }}
                        </h1>
                    </div>
                     <div class="pull-right">

            <form method="POST" action="{!! route('padministrativos.padministrativo.destroy', $padministrativo->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-xs" role="group">
                    <a href="{{ route('padministrativos.padministrativo.index') }}" class="btn btn-primary" title="Mostrar todos los Administrativos">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Mostrar</span>
                    </a>

                    <a href="{{ route('padministrativos.padministrativo.create') }}" class="btn btn-success" title="Crear Nuevo Administrativo">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Crear</span>
                    </a>
                    
                    <a href="{{ route('padministrativos.padministrativo.edit', $padministrativo->id ) }}" class="btn btn-primary" title="Editar Administrativo">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Editar</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Borrar Administrativo" onclick="return confirm(&quot;Delete Padministrativo??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Borrar</span>
                    </button>
                </div>
            </form>

        </div>

    </div>
<br><br>
    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Persona</dt>
            <dd>{{ optional($padministrativo->persona)->nombre }}</dd>
            <dt>Foto</dt>
            <dd><img src="/images/{{ $padministrativo->foto }}" width="100"></dd>
            <dt>Legajo</dt>
            <dd>{{ $padministrativo->legajo }}</dd>

        </dl>

    </div>
</div>
</div></div></div>

@endsection