@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')
    <h1>Agendar cita</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.appointments.store']) !!}
            @include('admin.appointments.partials.form')
            {!! Form::submit('Agendar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop