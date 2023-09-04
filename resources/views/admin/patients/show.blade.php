@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')

    <div class="d-flex justify-content-between">
        <img src="/../img/logo.png" width="90" height="90" align="left">
        <h1><b>HISTORIAL CLÍNICO</b></h1>
        <img src="/../img/vet.gif" width="90" height="90" align="right">
    </div>
    
@stop

@section('content')

    <div class="d-flex justify-content-center">
        <div class="card border border-secondary" style="width: 75rem;">
            <div class="card-body">
                <div class="container text-center">
                    <h5> <b>Datos Del Paciente</b></h5>
                    <div class="row border border-success">
                        <div class="col-3 table-primary"><strong>Nombre del responsable: </strong></div>
                        <div class="col-3 table-info">{{ $patient->nombre }} {{ $patient->ap_paterno }}
                            {{ $patient->ap_materno }}</div>
                        <div class="col-2 table-primary"><strong>Telefono: </strong></div>
                        <div class="col-4 table-info">{{ $patient->telefono }}</div>
                    </div>
                    <p></p>
                    <div class="row border border-success">
                        <div class="col-3 table-primary"><strong>Nombre de la mascota: </strong></div>
                        <div class="col-3 table-info">{{ $patient->nombre_mascota }}</div>
                        <div class="col-2 table-primary"><strong>Edad Mascota: </strong></div>
                        <div class="col-4 table-info">{{ $patient->edad_mascota }} {{ $patient->tmp_nacimiento }}</div>

                    </div>
                    <p></p>
                    <div class="row border border-success">
                        <div class="col-3 table-primary"><strong>Tipo: </strong></div>
                        <div class="col-3 table-info">{{ $patient->tipo }}</div>
                        <div class="col-2 table-primary"><strong>Raza: </strong> </div>
                        <div class="col-2 table-info">{{ $patient->raza }}</div>
                        <div class="col-1 table-primary"><strong>Peso: </strong></div>
                        <div class="col-1 table-info">{{ $patient->peso_mascota }}</div>
                    </div>
                    <p></p>
                    <div class="row border border-success">
                        <div class="col-12 table-primary">
                            <center><strong>Diagnostico Médico: </strong></center>
                        </div>
                    </div>
                    <div class="row border border-success"style="height: 200px">
                        <div class="col-12 table-light">{{ $patient->diagnostico }}</div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item border border-danger"><strong>ID {{ $patient->id }}</strong></li>
                    </ul>
                    <div>
                        <a class="btn btn-primary btn-md" href="{{ route('admin.patients.edit', $patient) }}">Editar</a>
                    </div>
                </div>
            </div>
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
