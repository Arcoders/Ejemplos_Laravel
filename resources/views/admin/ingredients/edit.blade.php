@extends('layouts.admin')

@section('content')

    <hr>

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
                $ingredient,
                [
                'route' => ['admin.ingredients.update', $ingredient->id],
                'class' => 'form-horizontal',
                'method' => 'PUT',
                'id' => 'edit-ingredient'
                ]
    ) !!}

    <div class="form-group">
        {!! form::label('name', 'Nombre') !!}
        {!! form::text('name', old('name'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! form::label('price', 'Precio') !!}
        {!! form::text('price', old('price'), ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Actualizar ingrediente', ['class' => 'btn btn-success']) !!}

    {!! Form::close() !!}

@endsection