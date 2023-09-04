@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')
    <h1>Editar venta</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif


    <div class="card">
        <div class="card-body">

            <div class="d-flex flex-column bd-highlight mb-3">
                <strong>Producto</strong>
                <input class="form-control" type="text" disabled value="{{$venta->saleArticle[0]->nombre}}" disabled>
            </div>
            <div class="d-flex flex-column bd-highlight mb-3">
                <strong>Código de barras</strong>
                <input class="form-control" type="text" disabled value="{{$venta->saleArticle[0]->codigo_barras}}" disabled>
            </div>

            {!! Form::model($venta, ['route' => ['admin.ventas.update', $venta], 'method' => 'put']) !!}

            @include('admin.ventas.partials.form')

            {!! Form::submit('Actualizar venta', ['class' => 'btn btn-primary']) !!}

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
