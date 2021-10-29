<!DOCTYPE html>
<html>
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
                        @page { margin: 0px; }
                    body { margin: 0px; }
                    html { margin: 0px}
                    </style>
                </link>
            </meta>
        </meta>
        <meta content="width=device-width, initial-scale=1" name="viewport">
            <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
            </link>
        </meta>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <div align="center" class="pull-left">
                                <h1 class="mt-5 mb-5">
                                    Hospital
                                </h1>
                            </div>
                        </div>
                        <br>
                            <div class="w3-container">
                                <table class="w3-table w3-striped w3-border">
                                    <tr class="w3-light-grey">
                                        <th>
                                            Paciente: {{ $consultas->paciente->persona->apellido }}, {{ $consultas->paciente->persona->nombre }}
                                        </th>
                                        <th>
                                            Edad: {{ $consultas->paciente->persona->edad }}
                                        </th>
                                        <th>
                                            DNI: {{ $consultas->paciente->persona->dni }}
                                        </th>
                                    </tr>
                                    <tr class="w3-light-grey">
                                        <th>
                                            Solicitante:  {{ Auth::user()->name }}
                                        </th>
                                        <th>
                                            Fecha y Hora:
                                        </th>
                                        <th>
                                            {{ $fecha }}
                                        </th>
                                    </tr>
                                </table>
                            </div>
                            <div class="panel-body">
                                <br>
                                    <div class="w3-container">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <table class="w3-table w3-striped w3-border">
                                                    <tr class="w3-light-grey">
                                                        <th>
                                                            Fecha
                                                        </th>
                                                        <th>
                                                            Medico
                                                        </th>
                                                        <th>
                                                            Arribo
                                                        </th>
                                                        <th>
                                                            Egreso
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            {{ $consultas->fecha }}
                                                        </td>
                                                        <td>
                                                            {{ $consultas->medico->persona->apellido }}, {{ $consultas->medico->persona->nombre }}
                                                        </td>
                                                        <td>
                                                            {{ $consultas->arribo }}
                                                        </td>
                                                        <td>
                                                            {{ $consultas->egreso }}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                        <div class="w3-container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="w3-table w3-striped w3-border">
                                                        <tr class="w3-light-grey">
                                                            <th>
                                                                Prioridad
                                                            </th>
                                                            <th>
                                                                Padecimiento Actual
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                {{ $consultas->prioridad->nombre }}
                                                            </td>
                                                            <td>
                                                                {{ $consultas->padecimiento_actual }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                            <div class="w3-container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="w3-table w3-striped w3-border">
                                                            <tr class="w3-light-grey">
                                                                <th>
                                                                    Diagnostico
                                                                </th>
                                                                <th>
                                                                    Receta
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    {{ $consultas->diagnostico }}
                                                                </td>
                                                                <td>
                                                                    {{ $consultas->receta }}
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </br>
                                    </br><br>
                                    <footer >
                               <div align="center" class="pull-left">
                                    <br>
                                    San Martin 468 - Ushuaia - Tierra del Fuego - Tel:(2901) 616181 int:124
                                    <br>
                                        email: hospital@gmail.com.ar
                                    </br>
                                </div>
                            </footer>
                            </div>
                        </br>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
