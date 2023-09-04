<div>
    <div class="card-header">
        <input wire:model="search" class="form-control"
            placeholder="Busque por el fabricante o por el nombre del artículo">
    </div>

    @if ($suppliers->count())
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-bordered table-md">
                    <thead class="text-white bg-info">
                        <tr>
                            <th>#</th>
                            <th>Razón social</th>
                            <th>Fabricante</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            @can('admin.suppliers.destroy', 'admin.suppliers.edit', 'admin.suppliers.show')
                                <th class="text-center" colspan="3">Acciones</th>
                            @elsecan('admin.suppliers.edit')
                                <th class="text-center">Acciones</th>
                            @elsecan('admin.suppliers.show')
                                <th class="text-center">Acciones</th>
                            @endcan

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->id }}</td>
                                <td>{{ $supplier->razon_social }}</td>
                                <td>{{ $supplier->fabricante }}</td>
                                <td>{{ $supplier->telefono }}</td>
                                <td>{{ $supplier->correo }}</td>

                                @can('admin.suppliers.show')
                                    <td class="text-center" width="10px">
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('admin.suppliers.show', $supplier) }}">
                                            <i class="fas fa-fw fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                @endcan
                                @can('admin.suppliers.edit')
                                    <td class="text-center" width="10px">
                                        <a class="btn btn-sm" style="background: #40d798; color: #ffffff"
                                            href="{{ route('admin.suppliers.edit', $supplier) }}">Editar</a>
                                    </td>
                                @endcan
                                @can('admin.suppliers.destroy')
                                    <td class="text-center" width="10px">
                                        <form class="eliminar-registro"
                                            action="{{ route('admin.suppliers.destroy', $supplier) }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer">
            {{ $suppliers->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún resgistro ...</strong>
        </div>
    @endif

</div>
