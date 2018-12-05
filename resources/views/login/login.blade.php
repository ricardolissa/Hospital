@extends('layouts.app')

@section('content')

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="{{ route('login.login.blade') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

<<<<<<< HEAD
  
  <body>
   <div class= panel panel-default> 
   <div class= "col-sm-4"></div>
   <div class= "col-sm-4">
 
    
    <br>  
    <form class="form-signin">
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      <br>
      <input type="email" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus>
      <br>
      <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>

=======
  <body class="text-center">
     <div class="col-sm-4"></div>
     <div class="col-sm-4">
>>>>>>> c1e63acd06165b040e636d3f977bde57f2c926da
    <form class="form-signin">
      <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
   
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      
      <br>
            <label for="inputEmail" class="sr-only">Email address</label>
      

      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <br>

      <label for="inputPassword" class="sr-only">Password</label>
      
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
      

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordarme
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
      @if(Auth::user()->hasRole('admin'))
    <div>Acceso como administrador</div>
    @else
      <div>Acceso usuario</div>
    @endif

    </form>
  </div>
<<<<<<< HEAD
<div class= "col-sm-4"></div>
</div>
</body>
=======
  <div class="col-sm-4"></div>
  </body>
</div>

>>>>>>> c1e63acd06165b040e636d3f977bde57f2c926da
</html>
@endsection
