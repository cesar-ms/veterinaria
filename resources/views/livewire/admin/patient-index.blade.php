<div>
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del paciente o mascota">
    </div>
    @if ($patients->count())
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-bordered table-sm">
                    <thead class="text-white bg-info">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Ap.Paterno</th>
                            <th>Ap.Materno</th>
                            <th>Mascota</th>
                            <th>Edad</th>
                            <th>Tipo</th>
                            <th>Raza</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            @can('admin.patients.destroy', 'admin.patients.edit', 'admin.patients.receta',
                                'admin.patients.show', 'admin.appointments.create')
                                <th class="text-center" colspan="5">Acciones</th>
                            @elsecan('admin.patients.edit')
                                <th class="center text-center">Acciones</th>
                            @elsecan('admin.patients.receta')
                                <th class="center text-center">Acciones</th>
                            @elsecan('admin.patients.show')
                                <th class="center text-center">Acciones</th>
                            @elsecan('admin.appointments.create')
                                <th class="admin.appointments.create">Acciones</th>
                            @endcan

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $patient)
                            <tr>
                                <td>{{ $patient->id }}</td>
                                <td>{{ $patient->nombre }}</td>
                                <td>{{ $patient->ap_paterno }}</td>
                                <td>{{ $patient->ap_materno }}</td>
                                <td>{{ $patient->nombre_mascota }}</td>
                                <td width="100px">{{ $patient->edad_mascota }} {{ $patient->tmp_nacimiento }}</td>
                                <td>{{ $patient->tipo }}</td>
                                <td>{{ $patient->raza }}</td>
                                <td>{{ $patient->telefono }}</td>
                                <td>{{ $patient->correo }}</td>

                                @can('admin.patients.receta')
                                    <td class="text-center" width="10px">
                                        <a class="btn btn-secondary btn-sm"
                                            href="{{ route('admin.patients.receta', $patient) }}">
                                            <i class="fas fa-fw fa-solid fa-file-medical "></i>
                                        </a>
                                    </td>
                                @endcan

                                @can('admin.patients.show')
                                    <td class="text-center" width="10px">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.patients.show', $patient) }}">
                                            <i class="fas fa-fw fa-solid fa-eye"></i>
                                        </a>
                                    </td>
                                @endcan

                                @can('admin.appointments.create')
                                    <td class="text-center" width="10px">
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('admin.appointments.create', $patient) }}">
                                            <i class="fas fa-fw fa-solid fa-calendar"></i>
                                        </a>
                                    </td>
                                @endcan

                                @can('admin.patients.edit')
                                    <td class="text-center" width="10px">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.patients.edit', $patient) }}">
                                            <i class="fas fa-fw fa-solid fa-pen"></i>
                                        </a>
                                    </td>
                                @endcan
                                @can('admin.patients.destroy')
                                    <td class="text-center" width="10px">
                                        <form class="eliminar-registro"
                                            action="{{ route('admin.patients.destroy', $patient) }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button class="btn btn-danger btn-sm" type="submit">
                                                <i class="fas fa-fw fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $patients->links() }}
            </div>
        </div>
    @else
        <div class="card-body">
            <strong>No se encontró ningún registro...</strong>
        </div>
    @endif
</div>
