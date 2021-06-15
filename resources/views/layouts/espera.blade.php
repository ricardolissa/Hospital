<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <meta content="width=device-width, initial-scale=1" name="viewport">
                        <title>
                            Tiempo de Espera
                        </title>
                        <!-- Scripts -->
                        
                        <!-- Fonts -->
                        <link href="https://fonts.gstatic.com" rel="dns-prefetch">
                            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
                                <!-- Styles -->
                                <link href="{{ asset('css/espera.css') }}" rel="stylesheet">
                                </link>
                            </link>
                        </link>
               
                </meta>
            </meta>
        </meta>
    </head>
    <body>
        
            <main class="py-4">
                @if (session()->has('flash'))
                <div class="alert alert-info">
                    {{session('flash') }}
                </div>
                @endif
            @yield('content')
            </main>
        </div>
    </body>
</html>
