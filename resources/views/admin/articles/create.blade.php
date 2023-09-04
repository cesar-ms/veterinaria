@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')
    <h1>Nuevo artículo</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.articles.store']) !!}
            @include('admin.articles.partials.formcr')
            {!! Form::submit('Agregar al inventario', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop
