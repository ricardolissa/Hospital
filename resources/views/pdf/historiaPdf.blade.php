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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <div align="center" class="pull-left">
                                <h1 class="mt-5 mb-5">
                                    {{ !empty($title) ? $title : 'Hospital: Historia Clinica'  }}
                                </h1>
                                <br>
                                    San Martin 468 - Ushuaia - Tierra del Fuego - Tel:(2901) 616181 int:124
                                    <br>
                                        email: hospital@gmail.com.ar
                                    </br>
                                </br>
                            </div>
                        </div>
                        <br>
                         <div class="w3-container">
                         <table class="w3-table w3-striped w3-border">
                                                
                                                    <tr class="w3-light-grey">
                                                        <th> Paciente: {{ $paciente->persona->apellido }}, {{ $paciente->persona->nombre }} </th>
                                                        <th> Edad: {{ $paciente->persona->edad }} </th>
                                                        <th> DNI: {{ $paciente->persona->dni }} </th>
                                                    </tr>

                                                    <tr class="w3-light-grey">
                                                         <th>  Solicitante:  {{ Auth::user()->name }} </th>
                                                         <th>  Fecha y Hora:</th>
                                                         <th>  {{ $fecha }} </th>
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
                                                    <th>Fecha</th>
                                                    <th>Medico</th>
                                                    <th>Diagnostico</th>
                                                    <th>Receta</th>
                                                </tr>
                                               @foreach($historiaclinicas as $historiaclinica)
                                                <tr>
                                                    <td>
                                                            {{ $historiaclinica->fecha }}
                                                    </td>
                                                    <td>
                                                            {{ $historiaclinica->medico->persona->nombre}}
                                                                {{ $historiaclinica->medico->persona->apellido}}
                                                    </td>
                                                    <td>
                                                            {{ $historiaclinica->diagnostico }}
                                                    </td>
                                                    <td>
                                                            {{ $historiaclinica->receta }}
                                                    </td>
                                                    
                                                </tr>
                                                @endforeach
                                                
                                            </table>
                                        </div>
                         
                                    </div>
                                </div>
                            </br>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>
