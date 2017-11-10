@extends('layouts.app')

@section('content')
    <div class="container">

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::model(
            $pizza,
            [
            'route' => ['pizzas.update', $pizza->id],
            'method' => 'PUT',
            'id' => 'eddit-pizza'
            ]
            ) !!}

        <div class="form-group">
            {!! form::label('name', 'Nombre') !!}
            {!! form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! form::label('price', 'Precio') !!}
            {!! form::text('price', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! form::label('description', 'Descripción') !!}
            {!! form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit('Editar una pizza', ['class' => 'btn btn-success']) !!}

        {!! Form::close() !!}


    </div>
@endsection