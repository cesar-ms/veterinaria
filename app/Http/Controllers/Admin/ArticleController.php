<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleSale;
use App\Models\ArticleSupplier;
use App\Models\Patient;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.articles.index')->only('index');
        $this->middleware('can:admin.articles.create')->only('create','store');
        $this->middleware('can:admin.articles.edit')->only('edit','update');
        $this->middleware('can:admin.articles.show')->only('show');
        $this->middleware('can:admin.articles.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::pluck('fabricante', 'id');

        /*$usera = auth(); */

        //dd($user);

        return view('admin.articles.create', compact('supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'tipo_articulo' => 'required',
            'categoria' => 'required',
            /* 'descripcion' => 'required',
            'fecha_caducidad' => 'required', */
            'num_pzas' => 'required',
            'costo_pzas' => 'required',
            'fecha_llegada' => 'required',
            'codigo_barras' => 'required',
        ]);

        /*  $article = Article::create($request->all()); */

        $id = Auth::id();

        $article = new Article();

        $article->nombre = $request->nombre;
        $article->tipo_articulo = $request->tipo_articulo;
        $article->categoria = $request->categoria;
        $article->descripcion = $request->descripcion;
        $article->fecha_caducidad = $request->fecha_caducidad;
        $article->num_pzas = $request->num_pzas;
        $article->costo_pzas = $request->costo_pzas;
        $article->fecha_llegada = $request->fecha_llegada;
        $article->costo_pzas = $request->costo_pzas;
        $article->codigo_barras = $request->codigo_barras;
        $article->user_id =  $id;
        $article->save(); // Se guarda el registro en la base de datos.

        $article->articleSupplier()->attach($request->supplier_id);

        return redirect()->route('admin.articles.edit',  $article)->with('info', '¡Se ha añadido un nuevo articulo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'nombre' => 'required',
            'tipo_articulo' => 'required',
            'categoria' => 'required',
            'descripcion' => 'required',
            'fecha_caducidad' => 'required',
            'num_pzas' => 'required',
            'costo_pzas' => 'required',
            'fecha_llegada' => 'required',
            'codigo_barras' => 'required',
        ]);

        $article->update($request->all());

        return redirect()->route('admin.articles.edit', compact('article'))->with('info', 'El artículo se actualizó con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->articleSales()->detach();
        $article->articleSupplier()->detach();
        $article->delete();

        return redirect()->route('admin.articles.index')->with('info', 'ok');
    }
}
