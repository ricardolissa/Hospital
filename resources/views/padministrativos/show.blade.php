@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Padministrativo' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('padministrativos.padministrativo.destroy', $padministrativo->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('padministrativos.padministrativo.index') }}" class="btn btn-primary" title="Show All Padministrativo">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('padministrativos.padministrativo.create') }}" class="btn btn-success" title="Create New Padministrativo">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('padministrativos.padministrativo.edit', $padministrativo->id ) }}" class="btn btn-primary" title="Edit Padministrativo">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Padministrativo" onclick="return confirm(&quot;Delete Padministrativo??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Persona</dt>
            <dd>{{ optional($padministrativo->persona)->created_at }}</dd>
            <dt>Foto</dt>
            <dd>{{ $padministrativo->foto }}</dd>
            <dt>Legajo</dt>
            <dd>{{ $padministrativo->legajo }}</dd>

        </dl>

    </div>
</div>

@endsection