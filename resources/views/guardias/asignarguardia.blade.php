@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Asignar Guardias</h4>
            </div>

            
        </div>
<div class="panel-body">
        <div>
            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('guardias.guardia.store') }}" accept-charset="UTF-8" id="create_guardia_form" name="create_guardia_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('guardias.formasignar', [
                                        'guardia' => null,
                                      ])

              

            </form>
            </div>
    </div>
<div class="row">
    <div class="col-md-4">
      Medicos Seleccionados 
    </div>
</div>


<div class="row" >
    <div class="col-md-4" >
        <table class="table table-hover table-striped">
            <tbody>
                <tr>
                    <td>
                        Especialidad
                    </td>
                    <td>
                        Nombre
                    </td>
                    <td>
                        Apellido
                    </td>
                    <td>
                    </td>
                    
                </tr>
                @foreach($medicos as $medico)
                <tr>
                    <td>
                       {{ $medico->especialidad }}
                    </td>
                    <td>
                       {{  $medico->persona->nombre }}
                    </td>
                    <td>
                       {{  $medico->persona->apellido }}
                    </td>
                    <td>


                         <form method="POST" action="" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('guardias.guardia.create', $medico->id ) }}" class="btn btn-info" title="Seleccionar">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">Seleccionar</span>
                                        </a>
                                        
                                     </div>

                                </form>
                   

                        </td>
                </tr>
            </tbody>
            @endforeach
        </table>

</div>
</div>
</div>

@endsection