@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-5 mb-5">Ingrese datos de la persona</h4>
            </span>

           

        </div>

        <div class="panel-body">
        
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

           
            <form method="POST" action="{{ route('vistadms.vistadm.store') }}" accept-charset="UTF-8" id="create_persona_form" name="create_persona_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('personas.form', [
                                        'persona' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Registrar Persona">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection


