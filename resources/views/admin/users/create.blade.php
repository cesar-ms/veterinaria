@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')
    <h1>Crear nuevo usuario</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @elseif(session('war'))
        <div class="alert alert-warning">
            <strong>{{ session('war') }}</strong>
        </div>
    @endif

    {!! Form::open(['route' => 'admin.users.store']) !!}
    <div class="row g-3">
        <div class="col">
            {!! Form::label('name', 'Nombre:') !!}
            {!! Form::text('name', null, [
                'class' => 'form-control',
            ]) !!}
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col">
            {!! Form::label('apellidoP', 'Apellido Paterno:') !!}
            {!! Form::text('apellidoP', null, ['class' => 'form-control']) !!}

            @error('apellidoP')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col">
            {!! Form::label('apellidoM', 'Apellido Materno:') !!}
            {!! Form::text('apellidoM', null, ['class' => 'form-control']) !!}
            @error('apellidoM')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row g-3">
        <div class="col-md-4">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@gmail.com']) !!}
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="col-md-2">
            {!! Form::label('cedula', 'Cedula:') !!}
            {!! Form::text('cedula', null, ['class' => 'form-control', 'placeholder' => 'Ej. 9877985']) !!}
        </div>

        <div class="col-md-2">
            {!! Form::label('fecha_contratacion', 'Fecha contratación:') !!}
            {!! Form::date('fecha_contratacion', null, ['class' => 'form-control']) !!}
            @error('fecha_contratacion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
    <div class="row mb-1 ">
        {!! Form::label('password', 'Contraseña:', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-md-12">
            {!! Form::password('password', null, ['class' => 'form-control']) !!}
        </div>
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="pt-5">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop
