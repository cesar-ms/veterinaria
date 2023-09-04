<div>
    {{-- TABLA DE ARTICULOS --}}
    <div class="row layout-top-spacing">
        <div class="col-sm-12 col-md-8">
            @can('admin.patients.receta')
                <div class="mb-2" wire:ignore wire:model="medId">
                    <select style="width: auto" class="form-control" id="select-dropdown">
                        <option value="">Seleccione los medicamento</option>
                        @foreach ($medicamentos as $m)
                            <option value="{{ $m->id }}">{{ $m->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    <form action="">
                        <input id="code" type="text" wire:model="search"
                            wire:keydown.enter.prevent="$emit('scan-code', $('#code').val())" class="form-control"
                            placeholder="Ingresa el código de barras">
                    </form>
                </div>
                <div class="card-body">
                    @if ($total > 0)
                        <div class="table table-hover table-bordered table-responsive tblscroll {{-- table-wrapper-scroll-y my-custom-scrollbar --}}"
                            style="max-height: 369px; overflow: hidden;">
                            <table class="table table-bordered table-striped my-1">
                                <thead class="text-white  bg-info">
                                    <tr>
                                        <th class="table-th text-center text-white">Artículo</th>
                                        <th class="table-th text-center text-white">Precio</th>
                                        <th width="13%" class="table-th text-center text-white">Cantidad</th>
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
                        </div>
                    @else
                        <h5 class="text-center text-muted">Agrega artículos a la venta</h5>
                    @endif

                    <div wire:loading.inline wire:target="saveSale">
                        <h4 class="text-success text-center">Guardando venta...</h4>
                    </div>

                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>


        <div class="col-sm-12 col-md-4">
            {{--  RESUMEN DE VENTAS --}}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-white bg-primary">
                            <h5 class="text-center mb-3">VENTA A REALIZAR</h5>
                        </div>
                        <div class="card-body">
                            <div>
                                <h5>TOTAL: ${{ number_format($total, 2) }}</h5>
                                <input type="hidden" id="hiddenTotal" value="{{ $total }}">
                            </div>

                            <div>
                                <h6 class="mt-3">Artículos: {{ $itemsQuantity }}</h6>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{-- PAGO VENTA --}}

            <div class="row mt-2">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header  text-white bg-primary">
                            <h5 class="text-center mb-3">PAGO DE VENTA</h5>
                        </div>
                        <div class="card-body">
                            <div class="input-group input-group-md mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input-gp hideonsm bg-success">
                                        Efectivo</span>
                                </div>
                                <input type="number" id="cash" wire:keydown.enter="ACash()" wire:model="efectivo"
                                    class="form-control text-center" value="{{ $efectivo }}">
                                <div class="input-group-append">
                                    <span wire:click="$set('efectivo', 0)" class="input-group-text bg-success">
                                        <i class="fas fa-backspace"></i>
                                    </span>
                                </div>
                            </div>

                            <h4 class="text-muted">Cambio: ${{ number_format($change, 2) }}</h4>

                            <div class="row justify-content-between mt-5">
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    @if ($total > 0)
                                        <button onclick="Confirm('','clearCart','¿ESTAS SEGUR@ DE ELIMINAR LA COMPRA?')"
                                            class="btn btn-danger mtmobile">
                                            <i class="fas fa-trash-alt"></i>
                                            CANCELAR
                                        </button>
                                    @endif
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    @if ($total > 0 && $efectivo >= $total)
                                        <button wire:click.prevent="saveSale" class="btn btn-success btn-md btn-block">
                                            <i class="fas fa-cart-plus"></i>
                                            GUARDAR
                                        </button>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            {{--   <div class="row mt-2">
                <div class="col-sm-12">
                    <div class="d-flex justify-content-end">
                        <Strong>ENVIAR MEDICAMENTOS A RECETA</Strong>
                        <td width="10px">
                            <a class="btn btn-sm" style="background: #f2f52a; color: #ffffff"
                                   href="{{ route('admin.patients.receta',$articles) }}">Enviar</a>
                        </td>
                    </div>
                </div>
            </div> --}}
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
                @this.selectMedicamento(mId);
            });
        });
    </script>
</div>
