<div>
    <div class="card">
        <p>{{$medId}}</p>
        <div class="card-header" wire:ignore wire:model="medId">
            <select class="form-control" id="select-dropdown">
                <option value="">Seleccione un medicamento</option>
                @foreach ($medicamentos as $m)
                    <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="card-body">
            @if ($total > 0)
                <table class="table table-success table-hover">
                    <thead>
                        <tr>
                            <th class="table-th text-center text-white">Nombre del medicamento</th>
                            <th class="table-th text-center text-white">Costo</th>
                            <th class="table-th text-center text-white">Cantidad</th>
                            <th class="table-th text-center text-white">Importe</th>
                            <th class="table-th text-center text-white">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>
                                    <h6>{{ $article->name }}</h6>
                                </td>
                                <td class="text-center">
                                    ${{ number_format($article->price, 2) }}
                                </td>
                                <td>
                                    <input type="number" id="r{{ $article->id }}"
                                        wire:change="updateQty({{ $article->id }},$('#r' + {{ $article->id }}).val())"
                                        style="font-size: 1rem!important" class="form-control text-center"
                                        value="{{ $article->quantity }}">
                                </td>
                                <td class="text-center">
                                    <h6>${{ number_format($article->price * $article->quantity, 2) }}</h6>
                                </td>
                                <td class="text-center">
                                    <button
                                        onclick="Confirm('{{ $article->id }}','removeItem','¿ESTAS SEGUR@ DE ELIMINAR ESTE REGISTRO?')"
                                        class="btn btn-danger mbmobile">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <button wire:click.prevent="decreaseQty({{ $article->id }})"
                                        class="btn btn-secondary mbmobile">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button wire:click.prevent="increaseQty({{ $article->id }})"
                                        class="btn btn-secondary mbmobile">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h5 class="text-center text-muted">Agrega los medicamentos</h5>
            @endif

        </div>
        <div class="card-footer">
            Total $
        </div>
    </div>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#select-dropdown').select2();
            $('#select-dropdown').on('change', function(e) {
                var mId = $('#select-dropdown').select2("val");
                var mNombre = $('#select-dropdown option:selected').text()
                @this.set('medId', mId)
                @this.set('medNombre', mNombre);
                @this.BuscarMed(mId);
            });
        });
    </script>

</div>
