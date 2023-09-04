@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')
    <h1>Editar servicio</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">

            {!! Form::model($service, ['route' => ['admin.services.update', $service], 'method' => 'put']) !!}
            @include('admin.services.partials.form')
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
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
