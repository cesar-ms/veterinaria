<?php

namespace App\Http\Livewire\Admin;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }


    public function render()
    {   
        $articles = Article::where('nombre', 'LIKE', '%'. $this->search .'%')->
        orWhere('codigo_barras', 'LIKE', '%'. $this->search .'%')->orderBy('id','desc')->paginate();
        

        return view('livewire.admin.article-index', compact('articles'));
    }
}
