<div>
    bpaciente
</div>
<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <div class="pull-left">
            <h4 class="mt-5 mb-5">
                Personas
            </h4>
        </div>
        <div class="btn-group btn-group-sm pull-right" role="group">
            <a class="btn btn-success" href="{{ route('personas.persona.create') }}" title="Create New Persona">
                <span aria-hidden="true" class="glyphicon glyphicon-plus">
                </span>
            </a>
        </div>
    </div>

	 @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
    @if(count($personas) == 0)
    <div class="panel-body text-center">
        <h4>
            No Personas Available!
        </h4>
    </div>
    @else
    <div class="panel-body panel-body-with-table">
        <div class="table-responsive">
            <table class="table table-striped ">
                <thead>
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
                        <th>
                            Email
                        </th>
                        <th>
                            Fecha Nacimiento
                        </th>
                        <th>
                            Edad
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personas as $persona)
                    <tr>
                        <td>
                            {{ $persona->nombre }}
                        </td>
                        <td>
                            {{ $persona->apellido }}
                        </td>
                        <td>
                            {{ $persona->dni }}
                        </td>
                        <td>
                            {{ $persona->email }}
                        </td>
                        <td>
                            {{ $persona->fecha_nacimiento }}
                        </td>
                        <td>
                            {{ $persona->edad }}
                        </td>
                    </tr>
                    @endforeach
           		</tbody>
            </table>
        </div>
    </div>
    @endif
</div>
