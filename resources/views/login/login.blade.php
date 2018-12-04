@extends('layouts.app')

@section('content')

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ route('login.login.blade') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
   
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
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Recordarme
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
  </div>
  <div class= "col-sm-4"></div>
  </body> 
</html>
@endsection
