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










<br>
    <div align="center">
        <h1>
            Guardia
        </h1>
    </div>
<br>
<br>
<br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>
                        Busqueda de Paciente
                    </h1>
                        <div class="pull-right">
                            <form accept-charset="UTF-8" action="{{ route('regpacientes.regpaciente.index') }}" class="form-inline pull-right" method="GET">
                                    <div class="form-group">
                                        <div class="col-md-10">
                                            <div>
                                            <input class="form-control" id="dni" minlength="1" name="dni" type="text" value="Ingrese el DNI">
                                            </input>
                                            </div>
                                            <div class="form-group">
                                                 <div class="col-md-10">
                                                <button class="btn btn-default" type="submit">
                                                    
                                                      <span class="btn btn-primary" aria-hidden="true">Buscar</span>
                                                            
                                                </button>
                                            </div>
                                            </div>
                                                  
                                        </div>
                                    </div>
                                    
                                    </div>
                            </form>



                           
                        </div>
                        

<br>
   
</br>

<div class="row">
    <div class="col-md-12">
        <table class="table table-hover table-striped">
            <tbody>
                <tr>
                    <td>
                        Nombre
                    </td>
                    <td>
                        Apellido
                    </td>
                    <td>
                        Dni
                    </td>
                    <td>
                        Obra Social
                    </td>
                    <td></td>
                </tr>
                @foreach($pacientes as $paciente)
                <tr>
                    <td>
                        {{ $paciente->nombre }}
                    </td>
                    <td>
                        {{ $paciente->apellido }}
                    </td>
                    <td>
                        {{ $paciente->dni }}
                    </td>
                    <td>
                        {{ $paciente->obraNombre }}
                    </td>
                 
                <td>
                        {{ $paciente->id }}
                    
                            


                    </td>
                    <td>
                        
                           
                                   

                    </td>

                    <td>
                         <form method="POST" action="{!! route('pacientes.paciente.destroy', $paciente->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('pacientes.paciente.show', $paciente->id ) }}" class="btn btn-info" title="Show Paciente">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true">Show</span>
                                        </a>
                                        <a href="{{ route('pacientes.paciente.edit', $paciente->id ) }}" class="btn btn-primary" title="Edit Paciente">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                                        </a>
                                        <a href="{{ route('regpacientes.regpaciente.triage', $paciente->id ) }}" class="btn btn-primary" title="Seleccionar">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true">Select</span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Paciente" onclick="return confirm(&quot;Delete Paciente?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                                        </button>
                                    </div>

                                </form>
                    </td>

                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

 <div class="form-group">
                                <div class="col-md-10">
                                             Registrar Paciente
                                            <a class="btn btn-primary" href="{{route('pacientes.paciente.create') }}" value="Seleccionar">
                                            Crear</a>


                                </div>
                            </div>
</div>
</div>

@endsection
