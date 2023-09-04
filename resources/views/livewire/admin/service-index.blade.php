<div>
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Busque por el servicio">
    </div>

    @if ($services->count())
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead class="text-white bg-info">
                        <tr>
                            <th>#</th>
                            <th>Servicio</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Costo</th>
                            {{--   <th>Dueño</th>
                        <th>Mascota</th> --}}
                            @can('admin.services.destroy', 'admin.services.edit')
                                <th class="text-center" colspan="2">Acciones</th>
                            @elsecan('admin.services.edit')
                                <th class="text-center">Acciones</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->nombre_servicio }}</td>
                                <td>{{ $service->tipo }}</td>
                                <td>{{ $service->fecha_servicio }}</td>
                                <td>{{ $service->hora }}</td>
                                <td>{{ $service->costo }}</td>
                                {{-- <td>{{ $service->servicePatient[0]->nombre}}</td>
                            <td>{{ $service->servicePatient[0]->nombre_mascota}}</td> --}}
                                @can('admin.services.edit')
                                    <td width="10px">
                                        <a class="btn btn-sm" style="background: #40d798; color: #ffffff"
                                            href="{{ route('admin.services.edit', $service) }}">Editar</a>
                                    </td>
                                @endcan
                                @can('admin.services.destroy')
                                    <td width="10px">
                                        <form class="eliminar-registro"
                                            action="{{ route('admin.services.destroy', $service) }}" method="POST">
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
            {{ $services->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún resgistro ...</strong>
        </div>
    @endif

</div>
