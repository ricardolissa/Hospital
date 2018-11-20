@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Obrasocials</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('obrasocials.obrasocial.create') }}" class="btn btn-success" title="Create New Obrasocial">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($obrasocials) == 0)
            <div class="panel-body text-center">
                <h4>No Obrasocials Available!</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Numero Socio</th>
                            <th>Plan</th>
                            <th>Nombre</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($obrasocials as $obrasocial)
                        <tr>
                            <td>{{ $obrasocial->numero_socio }}</td>
                            <td>{{ $obrasocial->plan }}</td>
                            <td>{{ $obrasocial->nombre }}</td>

                            <td>

                                <form method="POST" action="{!! route('obrasocials.obrasocial.destroy', $obrasocial->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('obrasocials.obrasocial.show', $obrasocial->id ) }}" class="btn btn-info" title="Show Obrasocial">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('obrasocials.obrasocial.edit', $obrasocial->id ) }}" class="btn btn-primary" title="Edit Obrasocial">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Obrasocial" onclick="return confirm(&quot;Delete Obrasocial?&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $obrasocials->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection