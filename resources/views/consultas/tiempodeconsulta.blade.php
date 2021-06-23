@extends('layouts.espera')

@section('content')

<script type="text/javascript">
    //document.write('it is '+Date() + '<br /> ');
 setTimeout(function () { 
      location.reload();
    },8000);
</script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
                    <div align="center" class="pull-left">
                        <h1 class="mt-5 mb-5">
                            <p class="font-weight-bold">Tiempo de Espera</p>
                        </h1>
                    </div>
                    <div class="panel-body panel-body-with-table">
                        <div class="table-responsive">
                            @if(count($consultasNoAtendidas) == 0)
                            <div class="panel-body text-center">
                                <h4>
                                    No se encuentran pacientes!
                                </h4>
                            </div>
                            @else
                            <table class="table table-striped ">
                                <thead align="center">
                                    <tr>
                                        <th>
                                            Apellido y Nombre
                                        </th>
                                        <th>
                                            Tiempo de espera
                                        </th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($consultasNoAtendidas as $consultas  )
                                    <tr>
                                        <td>
                                           <div class="p-3 mb-2 bg-primary text-white" align="center">
                                         <h1 class="display-5">
                                            {{ optional($consultas->paciente->persona)->apellido}}, {{ optional($consultas->paciente->persona)->nombre}} 
                                        </h1>
                                        </div> 
                                        </td>
                                        
                                        <td>
                                           <div class="p-3 mb-2 bg-success text-white"align="center">
                                            <h1 class="display-5">
                                          
                                          {{ $consultas->horaE }}
                                            
                                            </h1></div>



                                           </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div align="center">
    <script type="text/javascript" >
    document.write('Hoy es '+Date() + '<br /> ');
</script></div>

</div>
@endsection

