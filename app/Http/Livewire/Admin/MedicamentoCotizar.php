<?php

namespace App\Http\Livewire\Admin;

use App\Models\Article;
use Livewire\Component;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class MedicamentoCotizar extends Component
{
    public $total, $itemsQuantity, $medicamentos, $medId, $medNombre, $medDescri, $medCosto;

    public function mount()
    {
        $this->medicamentos = [];
    }

    public function render()
    {
        $this->medicamentos = Article::where('categoria', '=', 'medicamento')->orderBy('nombre', 'asc')->get();

        /*  $med =Cart::getContent();
        
    dd($med); */

        /* $article = Article::where('id', 41)->first();

        dd($article); */

        return view(
            'livewire.admin.medicamento-cotizar',
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

    public function BuscarMed($medId,$cant = 1)
    {

        $article = Article::where('id', $medId)->first();

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
            $title = 'Medicamento agregado';
        if ($exist) {
            if ($article->num_pzas < ($cant + $exist->quantity)) {
                $this->emit('no-stock', 'Medicamentos insuficientes :/');
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
            $title = 'Medicamento agregado';

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

        $newQty = ($item->quantity) - 1;

        if ($newQty > 0)
            Cart::add($item->id, $item->name, $item->quantity, $newQty);

        $this->total = Cart::getTotal();
        $this->itemsQuantity = Cart::getTotalQuantity();

        $this->emit('scan-ok', 'Cantidad actualizada');
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
}
