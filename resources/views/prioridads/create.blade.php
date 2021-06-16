@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Crear Prioridad' }}
                        </h1>
                    </div>
                    <div class="col-md-12">
            <div class="btn-group btn-group-xs pull-right" role="group">
                <a href="{{ route('prioridads.prioridad.index') }}" class="btn btn-primary" title="Mostrar todas las Prioridades">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">Mostrar</span>
                </a>
            </div>

        </div>
</div>
<br>
<div class="col-md-12">
        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('prioridads.prioridad.store') }}" accept-charset="UTF-8" id="create_prioridad_form" name="create_prioridad_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('prioridads.form', [
                                        'prioridad' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


