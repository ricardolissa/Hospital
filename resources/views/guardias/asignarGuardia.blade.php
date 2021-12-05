@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            {{ !empty($title) ? $title : 'Asignar Guardia' }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <br>
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
                <form accept-charset="UTF-8" action="{{ route('guardias.guardia.store') }}" class="form-horizontal" id="create_guardia_form" method="POST" name="create_guardia_form">
                    {{ csrf_field() }}

  
            @include ('guardias.formGuardia', [
                                        'guardia' => null,
                                      ])
                    <div class="form-group">
                       <div align="center" class="col-md-12">
                            <input class="btn btn-success" title="Crear Guardia" type="submit" value="Crear">
                            </input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
                        $('#medicoAsignado').chosen();
                    });
    </script>
</div>
@endsection
