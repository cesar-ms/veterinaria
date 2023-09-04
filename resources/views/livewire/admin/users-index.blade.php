<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" class="form-control" placeholder="Ingresa el nombre o correo del usuario">
        </div>
        @if ($users->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Apellido Paterno</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->apellidoP }}</td>
                                <td>{{ $user->email }}</td>
                                @can('admin.users.edit')
                                    <td width='10px'>
                                        <a class="btn btn-sm" href="{{ route('admin.users.edit', $user) }}"
                                            style="background: #40d798; color: #ffffff">Editar</a>
                                    </td>
                                @endcan
                                @can('admin.users.destroy')
                                    <td width="10px">
                                        <form class="eliminar-registro" action="{{ route('admin.users.destroy', $user) }}"
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
        @else
            <div class="card-body">
                <strong>No se encontró ningún registro...</strong>
            </div>
        @endif
        <div class="card-footer">
            {{ $users->links() }}
        </div>
    </div>
</div>
