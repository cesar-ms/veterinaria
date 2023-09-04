<?php

namespace App\Http\Livewire\Admin;

use App\Models\ArticleSupplier;
use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class SupplierIndex extends Component
{   
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {   
        /* $suppliers = ArticleSupplier::join('articles', 'articles.id', '=', 'article_id')
        ->join('suppliers', 'suppliers.id', '=', 'supplier_id')
        ->select(
            'article_supplier.id',
            'suppliers.razon_social', 
            'suppliers.fabricante',
            'suppliers.telefono', 
            'suppliers.correo', 
            'articles.nombre')
        ->where('suppliers.fabricante', 'LIKE', '%' . $this->search . '%')
        ->orWhere('articles.nombre', 'LIKE','%' . $this->search . '%')
        ->orderBy('id', 'desc')
        ->paginate(); */


        $suppliers = Supplier::where('fabricante', 'LIKE', '%' . $this->search . '%')
        ->orderBy('id', 'desc')
        ->paginate();
        
        return view('livewire.admin.supplier-index', compact('suppliers'));
    }
}
