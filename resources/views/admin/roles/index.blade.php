@extends('adminlte::page')

@section('title', 'Veterinaria')

@section('content_header')

    @can('admin.roles.create')
        <a class="btn btn-primary btn-sm float-right " href="{{ route('admin.roles.create') }}"
            style="width: 100px; color: white; font-weight: bold;">Nuevo</a>
    @endcan
    <h1>Lista de roles</h1>
@stop

@section('content')
    <div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Rol</th>
                            @can('admin.roles.destroy', 'admin.roles.edit')
                                <th colspan="2"></th>
                            @elsecan('admin.services.edit')
                                <th class="text-center">Acciones</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                @can('admin.roles.edit')
                                    <td width="10px">
                                        <a class="btn btn-sm " href="{{ route('admin.roles.edit', $role) }}"
                                            style="background: #40d798; color: #ffffff">Editar</a>
                                    </td>
                                @endcan
                                @can('admin.roles.destroy')
                                    <td width="10px">
                                        <form class="eliminar-registro" action="{{ route('admin.roles.destroy', $role) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
