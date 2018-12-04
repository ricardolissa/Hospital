@extends('layouts.app')

@section('content')
<br>
<div align="center">
    <h1>
        Guardia
    </h1>
</div>
<br>

<form accept-charset="UTF-8" action="{{ route('regpacientes.regpaciente.bpersona') }}" method="POST">
    {{ csrf_field() }}

    <div>
        <label>
            Dni
        </label>
    <br>    
        <input class="form-control" id="dni" minlength="1" name="dni" placeholder="Numero de Dni" type="text"></input>
       
        
    
    </div> 
    <br>
<input class="btn btn-primary" type="submit" value="Buscar"></input>
</form>
<br>
<div class="panel-body panel-body-with-table" >
        <div class="table-responsive" >
            <table class="table table-striped ">
                <thead >
                    <tr>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Apellido
                        </th>
                        <th>
                            Dni
                        </th>
                     </tr>  
                </thead>
                <tbody>
                    
                    <tr>
                        <td>
                         
                        </td>
                        <td>
                         
                        </td>
                        <td>
                         
                        </td>
                        <td>
                        <input class="btn btn-success pull-right" type="submit" value="Seleccionar" ></input>     
                        </td>
                        
                    </tr>
            
                </tbody>
            </table>
</div>
</div>
<br>
<form>
<div><label>Sintoma Actual</label></div>
<br>
<input class="form-control" name="padecimento_actual" type="text" id="padecimento_actual"  placeholder="Ingrese Sintoma Actual">


<br>

<div><label> Prioridad</label></div>
<br>
<select class="form-control" id="prioridad_id" name="prioridad_id">
                <option value=""  disabled selected>Seleccione Prioridad</option>
            
        </select>
</div>
<br>
</form>
     <div align="center">  
       <input class="btn btn-primary" type="submit" value="Registrar"></input>
</div>
 @endsection  