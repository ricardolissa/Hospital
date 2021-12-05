<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>
            Hospital
        </title>
        <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1" name="viewport">
                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
                    <script src="https://code.jquery.com/jquery-3.4.1.min.js">
                    </script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
                    </script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
                    </script>
                    <style>
                        .bcontent {
            margin-top: 10px;
        }
                    </style>
                </link>
            </meta>
        </meta>
    </head>
    <body>
        <div class="container-fluid bcontent">
        @if(Auth::user())
            <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            
                <a class="navbar-brand" href="{{ url('/') }}">
                    Hospital
                </a>
                <ul class="navbar-nav">
            @if (auth()->user()->role['name']=='admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                            Personal
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('padministrativos.padministrativo.index') }}">
                                Administrativos
                            </a>
                            <a class="dropdown-item" href="{{ route('medicos.medicos.index') }}">
                                Medicos
                            </a>
                            <a class="dropdown-item" href="{{ route('personas.persona.index') }}">
                                Personas
                            </a>
                            <a class="dropdown-item" href="{{ route('users.user.index') }}">
                                Usuarios
                            </a>
                            <a class="dropdown-item" href="{{ route('roles.role.index') }}">
                                Roles
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('pacientes.paciente.index') }}">
                            Pacientes
                        </a>
                    </li>
            @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                            Consultas
                        </a>
                        <div class="dropdown-menu">
                            @if (auth()->user()->role['name']=='admin')
                            <a class="dropdown-item" href="{{ route('consultas.consulta.index') }}">
                                Consultas
                            </a>
                            @endif
            <!-- Medico y Jefe Medico-->
            @if (auth()->user()->role['name']=='admin' or auth()->user()->role['name']=='medico' or auth()->user()->role['name']=='jmedico')
                            <a class="dropdown-item" href="{{ route('consultas.consulta.consultamedico') }}">
                                Medico Consultas
                            </a>
                            <a class="dropdown-item" href="{{ route('consultas.consulta.historiaclinica') }}">
                                Historia Clinica
                            </a>
            @endif
            <!-- Padministrativo -->
            @if (auth()->user()->role['name']=='admin' or auth()->user()->role['name']=='pad')
                            <a class="dropdown-item" href="{{ route('regpacientes.regpaciente.index') }}">
                                Registros de pacientes
                            </a>
                            <a class="dropdown-item" href="{{ route('consultas.consulta.tiempodeconsulta') }}">
                                Consultas en espera
                            </a>
            @endif
                        </div>
                    </li>
                     @if (auth()->user()->role['name']=='admin')
                    <li class="nav-item">
                        
                        <a class="nav-link" href="{{ route('obrasocials.obrasocial.index') }}">
                            Obra Social
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('prioridads.prioridad.index') }}">
                            Prioridades
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('especialidades.especialidad.index') }}">
                            Medicos Especialidades
                        </a>
                    </li>
                    @endif
            <!-- Jefe Medico-->
            @if (auth()->user()->role['name']=='admin' or auth()->user()->role['name']=='jmedico')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guardias.guardia.index') }}">
                            Guardias
                        </a>
                    </li>
            @endif
        
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>
                    </li>
                    @else
                    <li>
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
            </nav>
@endif
        </div>

    </body>
</html>

<main class="py-4">
    @yield('content')
</main>
