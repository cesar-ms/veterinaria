@extends('adminlte::page')

@section('plugins.Chartjs', true)

@section('title', 'Veterinaria')

@section('content_header')
    <h1>Estadísticas de los servicios</h1>
@stop

@section('content')
    @livewire('admin.statistics-service')
@stop

@section('css')
 {{--    <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
