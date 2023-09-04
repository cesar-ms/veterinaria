@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')
    <h1>Cotización de medicamentos</h1>
@stop

@section('content')

    @livewire('admin.medicamento-cotizar')

@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@stop
