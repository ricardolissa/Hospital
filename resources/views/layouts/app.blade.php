<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                    <!-- CSRF Token -->
                    <meta content="{{ csrf_token() }}" name="csrf-token">
                        <title>
                            {{ config('app.name', 'Laravel') }}
                        </title>
                        <!-- Scripts -->
                        <script defer="" src="{{ asset('js/app.js') }}">
                        </script>
                        <!-- Fonts -->
                        <link href="https://fonts.gstatic.com" rel="dns-prefetch">
                            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
                                <!-- Styles -->
                                <link crossorigin="anonymous" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" rel="stylesheet">
                                    {{--
                                    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
                                        --}}
                                        <style>
                                            body {
            padding-top: 65px;
            padding-bottom: 20px;
        }

        /* Set padding to keep content from hitting the edges */
        .body-content {
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Override the default bootstrap behavior where horizontal description lists 
           will truncate terms that are too long to fit in the left column.
           Also, add a 8pm to the bottom margin
        */
        .dl-horizontal dt {
            white-space: normal;
            margin-bottom: 8px;
        }

        /* Set width on the form input elements since they're 100% wide by default */
        input,
        select,
        textarea,
        .uploaded-file-group,
        .input-width-input {
            max-width: 380px;
        }

        .input-delete-container {
            width: 46px !important;
        }

        /* Vertically align the table cells inside body-panel */
        .panel-body .table > tr > td
        {
            vertical-align: middle;
        }

        .panel-body-with-table
        {
            padding: 0;
        }

        .mt-5 {
            margin-top: 5px !important;
        }

        .mb-5 {
            margin-bottom: 5px !important;
        }
                                        </style>
                                    </link>
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
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container">
                    <button aria-controls="navbar" aria-expanded="false" class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button">
                    </button>
                    <a class="navbar-brand" href="{!! url('/') !!}">
                        <img src="images/35x35logo.png"/>
                    </a>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="{!! url('/') !!}">
                                    Home
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="{!! route('regpacientes.regpaciente.index') !!}">
                                    Buscar Paciente
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="{!! route('regpacientes.regpaciente.cpaciente') !!}">
                                    Nuevo Paciente
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="{!! url('/') !!}">
                                    Lista de espera
                                </a>
                            </li>
                        </ul>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @guest
                        <ul class="nav navbar-nav">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </li>
                        </ul>
                        <ul class="nav navbar-nav">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </li>
                        </ul>
                        @else
                        <ul class="nav navbar-nav">
                        
                        <li class="nav-item dropdown">
                            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="navbarDropdown" role="button" v-pre="">
                                {{ Auth::user()->name }}
                                <span class="caret">
                                </span>
                            </a>
                            







                            <div aria-labelledby="navbarDropdown" class="nav navbar-nav">
                                <a class="nav navbar-nav" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            <!--/.nav-collapse -->
                        </li>
                        </ul>
                        @endguest
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </nav>

            <div class="container body-content">
                @yield('content')
            </div>
            
            <script crossorigin="anonymous" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" src="https://code.jquery.com/jquery-1.12.4.min.js">
            </script>
            
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js">
            </script>
            {{--
            <script src="{{ asset('js/app.js') }}">
            </script>
            --}}
            <script type="text/javascript">
                $(function(){

             // sends the uploaded file file to the fielselect event
            $(document).on('change', ':file', function() {
                var input = $(this);
                var label = input.val().replace(/\\/g, '/').replace(/.*\//, '');

                input.trigger('fileselect', [label]);
            });
            </script>
        

    </body>
</html>
