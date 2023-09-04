@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')
    <h1>Crear nuevo rol</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    @if (session('war'))
        <div class="alert alert-warning">
            <strong>{{ session('war') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.roles.store']) !!}
            @include('admin.roles.partials.form')
            {!! Form::submit('Crear rol', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
