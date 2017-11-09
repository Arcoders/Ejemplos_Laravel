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

        {!! Form::model($pizza, ['action' => 'PizzaController@store']) !!}

            <div class="form-group">
                {!! form::label('name', 'Nombre') !!}
                {!! form::text('name', old('name'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! form::label('price', 'Precio') !!}
                {!! form::text('price', old('price'), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! form::label('description', 'Descripción') !!}
                {!! form::textarea('description', old('description'), ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Añadir una pizza', ['class' => 'btn btn-success']) !!}

        {!! Form::close() !!}


    </div>
@endsection