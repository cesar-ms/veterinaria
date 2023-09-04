<?php

namespace App\Http\Livewire\Admin;

use App\Models\ArticleSale;
use Livewire\Component;
use Livewire\WithPagination;

class SaleIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        
        $ventas = ArticleSale::join('sales', 'sales.id', '=', 'sale_id')
             ->join('articles', 'articles.id', '=', 'article_id')
             ->select('sales.*', 'articles.nombre', 'articles.codigo_barras')
             ->where('sales.fecha_venta', 'LIKE', '%' . $this->search . '%')
             ->orwhere('articles.nombre', 'LIKE', '%' . $this->search . '%')
             ->orWhere('articles.codigo_barras', 'LIKE', $this->search . '%')->orderBy('id', 'desc')->paginate(15);
        
      //dd($ventas);

       return view('livewire.admin.sale-index',compact('ventas'));
    }
}
