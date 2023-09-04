@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')
    @can('admin.patients.create')
        <a class="btn btn-primary btn-sm float-right " href="{{ route('admin.patients.create') }}"
            style="width: 100px; color: white; font-weight: bold;">Registrar</a>
    @endcan
    <h1>Lista de pacientes</h1>
@stop

@section('content')
    @livewire('admin.patient-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @if (session('info') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'Operación exitosa',
                'success',
            )
        </script>
    @endif

    <script>
        $('.eliminar-registro').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas segur@?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Cancelar',
                confirmButtonText: '¡Sí, bórralo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@stop
