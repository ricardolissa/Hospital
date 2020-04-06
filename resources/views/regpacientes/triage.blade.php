@extends('layouts.app')

@section('content')
<br>
    <div align="center">
        <h1>
            Guardia
        </h1>
    </div>
    <br>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                        <form accept-charset="UTF-8" action="{{ route('regpacientes.regpaciente.store') }}" class="form-horizontal" id="create_regpaciente_form" method="POST" name="create_regpaciente_form">
                            {{ csrf_field() }}
                            @include ('regpacientes.form', [
                                        'regpaciente' => null,
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
            </div>
        </div>
    </br>
</br>
@endsection
