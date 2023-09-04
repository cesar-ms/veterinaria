<div>
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre o el código de barras del artículo">
    </div>
    @if ($articles->count())
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-bordered table-responsive table-sm">
                    <thead class="text-white bg-info">
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Caducidad</th>
                            <th>#Piezas</th>
                            <th>Costo</th>
                            <th class="text-center">Llegada</th>
                            <th>Código</th>
                            @can('admin.articles.destroy', 'admin.articles.edit')
                                <th class="text-center" colspan="2">Acciones</th>
                            @elsecan('admin.articles.edit')
                                <th class="text-center">Acciones</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->nombre }}</td>
                                <td>{{ $article->tipo_articulo }}</td>
                                <td>{{ $article->categoria }}</td>
                                <td>{{ $article->descripcion }}</td>
                                <td>{{ $article->fecha_caducidad }}</td>
                                <td class="text-center">{{ $article->num_pzas }}</td>
                                <td>{{ $article->costo_pzas }}</td>
                                <td class="text-center" width="100px">{{ $article->fecha_llegada }}</td>
                                <td>{{ $article->codigo_barras }}</td>
                                @can('admin.articles.edit')
                                    <td width="10px">
                                        <a class="btn btn-sm" style="background: #40d798; color: #ffffff"
                                            href="{{ route('admin.articles.edit', $article) }}">Editar</a>
                                    </td>
                                @endcan
                                @can('admin.articles.destroy')
                                    <td width="10px">
                                        <form class="eliminar-registro"
                                            action="{{ route('admin.articles.destroy', $article) }}" method="POST">
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
            <div class="card-footer">
                {{ $articles->links() }}
            </div>
        </div>
    @else
        <div class="card-body">
            <strong>No se encontró ningún registro...</strong>
        </div>
    @endif
</div>
