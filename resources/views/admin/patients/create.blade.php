@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')
    <h1>Registro de paciente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.patients.store']) !!}
            @include('admin.patients.partials.formpt')
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
