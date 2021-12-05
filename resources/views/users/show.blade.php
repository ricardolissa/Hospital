@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                           {{ $user->persona->nombre }} {{ $user->persona->apellido }}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md">
            
                    
                        <h3>Nombre : {{ $user->name }}</h3>
                    
                </div>
                
                <div class="col-md">
                    <h3> Email : {{ $user->email }}</h3>
                       
                </div>
            </div>
            <br>
            <div class="row">
            <div class="col-md">
                   <h3> Rol : {{ ($user->role)->descripcion }}</h3>
                       
                </div>
            <div class="col-md">        
                 <h3>  </h3>
                      
                </div>
            </div>
        </div>
    </div>
<br>
<div class="row" align="center">
        <div class="col-md-12">
            <div class="pull-right">
    

            <form method="POST" action="{!! route('users.user.destroy', $user->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-xs" role="group">
                    <a href="{{ route('users.user.index') }}" class="btn btn-primary" title="Show All User">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Volver</span>
                    </a>

                    <a href="{{ route('users.user.edit', $user->id ) }}" class="btn btn-success" title="Editar Usuario">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Editar</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Borrar Usuario" onclick="return confirm(&quot;Click Ok to delete User.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"> Borrar</span>
                            </button>
                        </div>
                    </input>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection