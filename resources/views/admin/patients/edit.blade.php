@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')
   <div></div>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">

            {!! Form::model($patient, ['route' => ['admin.patients.update', $patient], 'method' => 'put']) !!}
            @include('admin.patients.partials.form')
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
