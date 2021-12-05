@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                           {{ $persona->nombre }} {{ $persona->apellido }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
            
                    
                        <h3>D.N.I. : {{ $persona->dni }}</h3>
                    
                </div>
                <div class="col-md-6">        
                 
                       <h3> Email : {{ $persona->email }}</h3>
                   
                       
                </div>
            </div>
            <br>
             <div class="row">        
                    <div class="col-md-6">   
                    <h3> Fecha Nacimiento :  {{ $persona->fecha_nacimiento }}</h3>
                  </div>
                  <div class="col-md-6">   
                       <h3> Edad : {{ $persona->edad }}</h3>
                   </div>
            </div>
            <br>
             <div class="row">       
                       <div class="col-md-6">   
                       <h3>Telefono: {{ $persona->telefono1 }}</h3>
                   </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row" align="center">
        <div class="col-md-12">
            <div class="pull-right">
                <form accept-charset="UTF-8" action="{!! route('personas.persona.destroy', $persona->id) !!}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                        {{ csrf_field() }}
                        <div class="btn-group btn-group-xs" role="group">
                            
                            <a class="btn btn-primary" href="{{ route('personas.persona.index') }}" title="Mostrar">
                                <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                    Volver
                                </span>
                            </a>
                          
                            <a class="btn btn-success" href="{{ route('personas.persona.edit', $persona->id ) }}" title="Editar Persona">
                                <span aria-hidden="true" class="glyphicon glyphicon-pencil">
                                    Editar
                                </span>
                            </a>
                            <button class="btn btn-danger" onclick='return confirm("Delete Persona??")' title="Borrar Persona" type="submit">
                                <span aria-hidden="true" class="glyphicon glyphicon-trash">
                                    Borrar
                                </span>
                            </button>
                        </div>
                    </input>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
