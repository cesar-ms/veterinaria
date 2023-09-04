<div>

    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o el código de barras del producto">
    </div>

    @if ($ventas->count())
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead class="text-white bg-info">
                        <tr>
                            <th>#</th>
                            <th>Responsable</th>
                            <th>Producto</th>
                            <th>#Piezas</th>
                            <th>Costo</th>
                            <th>Importe</th>
                            <th>Fecha</th>
                            <th>Código de Barras</th>
                            @can('admin.ventas.destroy', 'admin.ventas.edit')
                                <th class="text-center" colspan="2">Acciones</th>
                            @elsecan('admin.ventas.edit')
                                <th class="text-center">Acciones</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas as $venta)
                            <tr>
                                <td>{{ $venta->id }}</td>
                                <td>{{ $venta->responsable }}</td>
                                <td>{{ $venta->nombre }}</td>
                                <td>{{ $venta->pzas_venta }}</td>
                                <td>{{ $venta->costo }}</td>
                                <td>{{ $venta->costo * $venta->pzas_venta }}</td>
                                <td>{{ $venta->fecha_venta }}</td>
                                <td>{{ $venta->codigo_barras }}</td>
                                @can('admin.ventas.edit')
                                    <td width="10px">
                                        <a class="btn mbmobile btn-sm" style="background: #40d798; color: #ffffff"
                                            href="{{ route('admin.ventas.edit', $venta) }}">Editar</a>
                                    </td>
                                @endcan
                                @can('admin.ventas.destroy')
                                    <td width="10px">
                                        <form class="eliminar-registro" action="{{ route('admin.ventas.destroy', $venta) }}"
                                            method="POST">
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
            {{ $ventas->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún resgistro ...</strong>
        </div>
    @endif

</div>
