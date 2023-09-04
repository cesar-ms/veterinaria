@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')
    <h1>Artículos de los proveedores</h1>
@stop

@section('content')

    <div class="card">
        <div class="card-header">
            <p style="padding-top: 15px">Lista de artículos que le pertenecen al fabricante:
                <strong>{{ $supplier->fabricante }}</strong>
            </p>
        </div>
        @if ($supplier->supplierArticle->count())
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <ul class="list-group">
                            <li class="list-group-item active" aria-current="true">Nombre</li>
                            @foreach ($supplier->supplierArticle as $item)
                                <li class="list-group-item">{{ $item->nombre }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="list-group">
                            <li class="list-group-item active" aria-current="true">Código de barras</li>
                            @foreach ($supplier->supplierArticle as $item)
                                <li class="list-group-item">{{ $item->codigo_barras }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @else
            <div class="card-body">
                <strong>El proveedor no cuenta con artículos registrados...</strong>
            </div>
        @endif
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
