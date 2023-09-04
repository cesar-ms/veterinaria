@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')
    <h1>RECETA MÉDICA</h1>
    <div style="margin-top: 1rem" class="d-flex justify-content-between">
        <a  href="{{ route('admin.ventas.create', $patient) }}">Cotizar medicamento</a>
        <a href=javascript:window.print()> Imprimir</a>
    </div>    
@stop

@section('content')
    <div class="card border border-secondary">
        <div class="card-body" style="text-align: center">
            <div class="d-flex justify-content-between">
                <img style="width: 100px; height:150px ;" src="{{ asset('img/icnoUnam.png') }}" />
                <div class="align-self-center">
                    <h3 style="font-family: 'Kaushan Script', cursive;">Dr. {{ $patient->user[0]->name }} {{ $patient->user[0]->apellidoP }}
                        {{ $patient->user[0]->apellidoM }}</h3>
                </div>
                <div>
                    <img style="width: 120px; height:150px ;" src="{{ asset('img/fes-icono.jpg') }}" />
                </div>
            </div>
            <div style=" margin:0px auto; height:100%; width: 80%; ">
                <div class="d-flex justify-content-start">
                    <strong>Dueño: </strong>
                    <p style="text-decoration: underline; margin-left:5px;"> {{ $patient->nombre }}
                        {{ $patient->ap_paterno }} {{ $patient->ap_materno }}</p>
                </div>
                <div class="d-flex justify-content-between">
                    <p><strong>Mascota: </strong>{{ $patient->nombre_mascota }}</p>
                    <p><strong>Edad: </strong> {{ $patient->edad_mascota }} {{ $patient->tmp_nacimiento }}</p>
                    <p><strong>Raza: </strong> {{ $patient->raza }}</p>
                    <p><strong>Peso: </strong> {{ $patient->peso_mascota }} Kg</p>
                </div>
                <div class="form-floating" style="padding-bottom: 4rem">
                    <label for="floatingTextarea2">Medicamentos</label>
                    <textarea class="form-control" placeholder="Escriba los medicamentos recetados" id="floatingTextarea2"
                        style="height: 250px"></textarea>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <strong>Fecha:</strong><input type="date">
                </div>
                    {{--  <hr style="width:50%;text-align:left;margin-left:0; background-color: black"> --}}
                     <strong>Firma:_________________________________</strong>       
            </div>
        </div>
    </div>
  
@stop

@section('css')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
