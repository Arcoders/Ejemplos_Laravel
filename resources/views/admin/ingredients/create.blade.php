@extends('layouts.admin')

@section('content')

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($ingredient, ['action' => 'Admin\IngredientController@store']) !!}

    <div class="form-group">
        {!! form::label('name', 'Nombre') !!}
        {!! form::text('name', old('name'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! form::label('price', 'Precio') !!}
        {!! form::text('price', old('price'), ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Añadir ingrediente', ['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}

@endsection