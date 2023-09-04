<div>
    <div class="card-header">
        <input wire:model="search" class="form-control"
            placeholder="Busque por descripción, hora, fecha de la cita o nombre del dueño de la mascota">
    </div>

    @if ($appointments->count())
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead class="text-white bg-info">
                        <tr>
                            <th>#</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Dueño</th>
                            @can('admin.appointments.destroy','admin.appointments.edit')
                                <th class="text-center" colspan="2">Acciones</th>
                            @elsecan('admin.appointments.edit')
                                <th class="text-center">Acciones</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->id }}</td>
                                <td>{{ $appointment->descripcion }}</td>
                                <td width="100px">{{ $appointment->fecha_cita }}</td>
                                <td>{{ $appointment->hora }}</td>
                                <td>{{ $appointment->patient->nombre }}</td>
                                @can('admin.appointments.edit')
                                    <td width="10px">
                                        <a class="btn btn-sm" style="background: #40d798; color: #ffffff"
                                            href="{{ route('admin.appointments.edit', $appointment) }}">Editar</a>
                                    </td>
                                @endcan
                                @can('admin.appointments.destroy')
                                    <td width="10px">
                                        <form class="eliminar-registro"
                                            action="{{ route('admin.appointments.destroy', $appointment) }}" method="POST">
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
            {{ $appointments->links() }}
        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún resgistro ...</strong>
        </div>
    @endif

</div>
