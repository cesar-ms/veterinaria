<?php

namespace App\Http\Livewire\Admin;

use App\Models\Article;
use App\Models\ArticleSale;
use App\Models\Sale;
use Carbon\Carbon;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class VenderIndex extends Component
{
    /*  public $search = ''; */
    public  $medicamentos, $medId, $medNombre, $total, $itemsQuantity, $efectivo, $change, $search;

    public function mount()
    {
        $this->efectivo = 0;
        $this->change = 0;
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
    }

    public function render()
    {

        /*   $items = Cart::getContent(); */

        $this->medicamentos = Article::where('categoria', '=', 'medicamento')->orderBy('nombre', 'asc')->get();


        /* dd($items); */
        return view(
            'livewire.admin.vender-index',
            [
                'articles' => Cart::getContent()->sortBY('name'),
            ]
        );
    }

    public function ACash()
    {
        if ($this->efectivo == 0) {
            $this->change = 0;
        } else {
            $this->change = ($this->efectivo - $this->total);
        }
    }

    protected $listeners = [
        'scan-code' => 'ScanCode',
        'removeItem' => 'removeItem',
        'clearCart' => 'clearCart',
        'saveSale' => 'saveSale',
    ];

    public function ScanCode($barcode, $cant = 1)
    {
        $article = Article::where('codigo_barras', $barcode)->orWhere('nombre', $barcode)->first();

        if ($article == null || empty($article)) {
            $this->emit('scan-notfound', 'El artículo no está registrado');
        } else {
            if ($this->InCart($article->id)) {
                $this->increaseQty($article->id);
                return;
            }
            if ($article->num_pzas < 1) {
                $this->emit('no-stock', 'Artículos insuficientes :/');
                return;
            }
            Cart::add($article->id, $article->nombre, $article->costo_pzas, $cant);
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            $this->emit('scan-ok', 'Artículo agregado');
        }
    }

    public function selectMedicamento($medId, $cant = 1)
    {
        $article = Article::where('id', $medId)->first();

        if ($article == null || empty($article)) {
            $this->emit('scan-notfound', 'Seleciona un medicamento');
        } else {
            if ($this->InCart($article->id)) {
                $this->increaseQty($article->id);
                return;
            }
            if ($article->num_pzas < 1) {
                $this->emit('no-stock', 'Artículos insuficientes :/');
                return;
            }
            Cart::add($article->id, $article->nombre, $article->costo_pzas, $cant);
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            $this->emit('scan-ok', 'Medicamento agregado');
        }
    }

    public function InCart($articleId)
    {
        $exist = Cart::get($articleId);
        if ($exist)
            return true;
        else
            return false;
    }

    public function increaseQty($articleId, $cant = 1)
    {
        $title = '';
        $article = Article::find($articleId);
        $exist = Cart::get($articleId);
        if ($exist)
            $title = 'Cantidad actualizada';
        else
            $title = 'Artículo agregado';
        if ($exist) {
            if ($article->num_pzas < ($cant + $exist->quantity)) {
                $this->emit('no-stock', 'Artículos insuficientes :/');
                return;
            }
        }

        Cart::add($article->id, $article->nombre, $article->costo_pzas, $cant);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();

        $this->emit('scan-ok', $title);
    }

    public function updateQty($articleId, $cant = 1)
    {
        $title = '';
        $article = Article::find($articleId);
        $exist = Cart::get($articleId);

        if ($exist)
            $title = 'Cantidad actualizada';
        else
            $title = 'Articulo agregado';

        if ($exist) {
            if ($article->num_pzas < $cant) {
                $this->emit('no-stock', 'Artículos insuficientes :/');
                return;
            }

            $this->removeItem($articleId);

            if ($cant > 0) {
                Cart::add($article->id, $article->nombre, $article->costo_pzas, $cant);

                $this->total = Cart::getTotal();
                $this->itemsQuantity = Cart::getTotalQuantity();

                $this->emit('scan-ok', $title);
            } else {
                $this->emit('no-stock', 'La cantidad debe ser mayor a cero');
            }
        }
    }

    public function removeItem($articleId)
    {
        Cart::remove($articleId);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();

        $this->emit('scan-ok', 'Artículo eliminado');
    }

    public function decreaseQty($articleId)
    {
        $item = Cart::get($articleId);
        Cart::remove($articleId);
        $article = Article::find($articleId);
        try {
            $newQty = ($item->quantity) - 1;

            if ($newQty > 0)
                Cart::add($item->id, $item->name,$article->costo_pzas, $newQty);
    
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
    
            $this->emit('scan-ok', 'Cantidad actualizada');
        } catch (Exception $e) {
            $this->emit('sale-error', $e->getMessage());
        }
       
    }

    public function clearCart()
    {
        Cart::clear();
        $this->efectivo = 0;
        $this->change = 0;
        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();
        $this->emit('scan-ok', 'venta vacía');
    }

    public function saveSale()
    {
        if ($this->total <= 0) {
            $this->emit('sale-error', 'AGREGA ARTÍCULOS A LA VENTA');
            return;
        }

        if ($this->efectivo <= 0) {
            $this->emit('sale-error', 'INGRESE EL EFECTIVO');
            return;
        }

        if ($this->total > $this->efectivo) {
            $this->emit('sale-error', 'EL EFECTIVO DEBE SER MAYOR O IGUAL AL TOTAL');
            return;
        }

        DB::beginTransaction();

        try {

            $items = Cart::getContent();

            foreach ($items as $item) {
                $sale = Sale::create([
                    'responsable' => Auth()->user()->name,
                    'pzas_venta' => $item->quantity,
                    'costo' => $item->price,
                    'fecha_venta' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                $sale->saleArticle()->attach($item->id);
            }

            if ($sale) {
                foreach ($items as $item) {
                    $article = Article::find($item->id);
                    $article->num_pzas = $article->num_pzas - $item->quantity;
                    $article->save();
                }
            }
            DB::commit();

            Cart::clear();
            $this->efectivo = 0;
            $this->change = 0;
            $this->total = Cart::getTotal();
            $this->itemsQuantity = Cart::getTotalQuantity();
            $this->emit('sale-ok', 'venta registrada con exito');
            $this->emit('print-ticket', $sale->id);
        } catch (Exception $e) {
            DB::rollBack();
            $this->emit('sale-error', $e->getMessage());
        }
    }

    public function printTicket($sale)
    {
        return Redirect::to("print://$sale->id");
    }
}
