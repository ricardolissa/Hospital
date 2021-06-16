@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

    <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Nueva Obra Social' }}
                        </h1>
                    </div>
        </div>
        <div class="col-md-12">

            <div class="btn-group btn-group-xs pull-right" role="group">
                <a href="{{ route('obrasocials.obrasocial.index') }}" class="btn btn-primary" title="ostrar todas las Obra Sociales">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">Mostrar</span>
                </a>
            </div>


    </div>
    <br>
    <div class="panel-body">
        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>
        @endif
        <form accept-charset="UTF-8" action="{{ route('obrasocials.obrasocial.store') }}" class="form-horizontal" id="create_obrasocial_form" method="POST" name="create_obrasocial_form">
            {{ csrf_field() }}
            @include ('obrasocials.form', [
                                        'obrasocial' => null,
                                      ])
            <div class="form-group">
                <div class="col-md-offset-2 col-md-10">
                    <input class="btn btn-success" type="submit" value="Crear Obra Social">
                    </input>
                </div>
            </div>
        </form>
    </div>
</div>
</div></div></div>
@endsection
