<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <!-- CSRF Token -->
                    <meta content="{{ csrf_token() }}" name="csrf-token">
                        <title>
                            Hospital
                        </title>
                        <!-- Scripts -->
                        <script defer="" src="{{ asset('js/app.js') }}">
                        </script>
                        <!-- Fonts -->
                        <link href="https://fonts.gstatic.com" rel="dns-prefetch">
                            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
                                <!-- Styles -->
                                <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                                </link>
                            </link>
                        </link>
                    </meta>
                </meta>
            </meta>
        </meta>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-inverse">
                @if(Auth::user())
                <div class="container-fluid">
                    <ul class="topnav">
                        <li>
                            <a class="navbar-brand" href="{{ url('/') }}">
                                Hospital
                            </a>
                        </li>
                   
                @if (auth()->user()->role['name']=='admin')
                                
                             <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Personal
                                        <span class="caret">
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu">


                                        <li>
                                            <a href="{{ route('padministrativos.padministrativo.index') }}">
                                                Administrativos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('medicos.medicos.index') }}">
                                                Medicos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('personas.persona.index') }}">
                                                Personas
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('users.user.index') }}">
                                                Usuarios
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('roles.role.index') }}">
                                                Roles
                                            </a>
                                        </li>
                                    </ul>
                            </li>
                                <li>
                                    <a href="{{ route('pacientes.paciente.index') }}">
                                        Pacientes
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        Consultas
                                        <span class="caret">
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('consultas.consulta.index') }}">
                                                Consultas
                                            </a>
                                        </li>
                                        <!-- Medico y Jefe Medico-->
                                        @if (auth()->user()->role['name']=='admin' or auth()->user()->role['name']=='medico' or auth()->user()->role['name']=='jmedico')
                                        <li>
                                            <a href="{{ route('consultas.consulta.consultamedico') }}">
                                                Medico Consultas
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('consultas.consulta.historiaclinica') }}">
                                                Historia Clinica
                                            </a>
                                        </li>
                                        @endif
                                        <!-- Padministrativo -->
                                        @if (auth()->user()->role['name']=='admin' or auth()->user()->role['name']=='pad')
                                        <li>
                                            <a href="{{ route('regpacientes.regpaciente.index') }}">
                                                Registros de pacientes
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('consultas.consulta.tiempodeconsulta') }}">
                                                Consultas en espera
                                            </a>
                                            @endif
                                        </li>
                                    </ul>
                                    <li>
                                        <a href="{{ route('obrasocials.obrasocial.index') }}">
                                            Obra Social
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('prioridads.prioridad.index') }}">
                                            Prioridades
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('especialidades.especialidad.index') }}">
                                            Medicos Especialidades
                                        </a>
                                    </li>
                                    <!-- Jefe Medico-->
                                    @if (auth()->user()->role['name']=='admin' or auth()->user()->role['name']=='jmedico')
                                    <li>
                                        <a href="{{ route('guardias.guardia.index') }}">
                                            Guardias
                                        </a>
                                    </li>
                                    @endif
                                </li>
                                @endif
                            </li>
                        </li>

                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button" v-pre="">
                                {{ Auth::user()->name }}
                                <span class="caret">
                                </span>
                            </a>
                            <div aria-labelledby="navbarDropdown" class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </body>
</html>
@endif
<main class="py-4">
    @yield('content')
</main>
