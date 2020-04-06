@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Obrasocial' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('obrasocials.obrasocial.destroy', $obrasocial->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('obrasocials.obrasocial.index') }}" class="btn btn-primary" title="Show All Obrasocial">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('obrasocials.obrasocial.create') }}" class="btn btn-success" title="Create New Obrasocial">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('obrasocials.obrasocial.edit', $obrasocial->id ) }}" class="btn btn-primary" title="Edit Obrasocial">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Obrasocial" onclick="return confirm(&quot;Delete Obrasocial??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            
            <dt>Nombre</dt>
            <dd>{{ $obrasocial->nombre }}</dd>

        </dl>

    </div>
</div>

@endsection