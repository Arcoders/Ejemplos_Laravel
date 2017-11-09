@extends('layouts.app')

@section('title', 'Pizzas del usuario')

@section('content')
    <div class="container">

        <p>
            {{ link_to_action('PizzaController@create', 'Crear una pizza', [], [])  }}
            |
            {{ link_to_action('PizzaController@index', 'Mis pizzas', [], [])  }}
        </p>

        <hr/>

         @if(session('message'))
             <div class="alert alert-success">
                 {{ session('message') }}
             </div>
         @endif

        @forelse($pizzas as $pizza)

                <div class="panel panel-default">

                    <div class="panel-heading">{{ $pizza->name }}</div>
                    <div class="body">
                        <p>Precio: {{ $pizza->price }}</p>
                        {{ $pizza->description }}
                    </div>

                    <div class="panel-footer">
                        {{
                            link_to_action(
                            'PizzaController@edit',
                            'Editar',
                            ['id' => $pizza->id],
                            ['class' => 'col-md-2']
                            )
                        }}

                        @if($pizza->trashed())
                            {!! form::open(
                                    [
                                        'method' => 'PATCH',
                                        'route' => ['pizzas.restore', $pizza->id]
                                    ]
                            ) !!}

                            {!! Form::submit('Restaurar', ['class' => 'btn btn-xs btn-warning col-md-2']) !!}

                            {!! Form::close() !!}
                        @endif
                    </div>

                    <span class="pull-right">
                        {!! Form::open(
                                    [
                                    'method' => 'DELETE',
                                    'route' => ['pizzas.destroy', $pizza->id]
                                    ]
                        ) !!}

                        {!! Form::submit('Eliminar', ['class' => 'btn btn-xs btn-danger']) !!}

                        {!! Form::close() !!}
                    </span>

                </div>

            @empty
                <div class="alert alert-danger">
                    No hay pizzas
                </div>

        @endforelse

        @if($pizzas)
            {{ $pizzas->links() }}
        @endif

    </div>
@endsection