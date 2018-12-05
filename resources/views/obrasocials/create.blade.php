@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <span class="pull-left">
            <h4 class="mt-5 mb-5">
                Crear Obra Social
            </h4>
        </span>
        <div class="btn-group btn-group-sm pull-right" role="group">
            <a class="btn btn-primary" href="{{ route('obrasocials.obrasocial.index') }}" title="Mostrar Obra Social">
                <span aria-hidden="true" class="glyphicon glyphicon-th-list">
                </span>
            </a>
        </div>
    </div>
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
                    <input class="btn btn-primary" type="submit" value="Add">
                    </input>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
