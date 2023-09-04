<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class SaleController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.ventas.index')->only('index');
        $this->middleware('can:admin.ventas.create')->only('create','store');
        $this->middleware('can:admin.ventas.edit')->only('edit','update');
        $this->middleware('can:admin.ventas.show')->only('show');
        $this->middleware('can:admin.ventas.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $search;

    public function index()
    {
        $ventas = Sale::all();
        return view('admin.ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.ventas.create");
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
            'responsable' => 'required',
            'pzas_venta' => 'required',
            'costo' => 'required',
            'fecha_venta' => 'required',
        ]);

        $articulo = Article::where('nombre', 'LIKE', '%$nombre%');

        $venta = Sale::create($request->all());

        return redirect()->route('admin.ventas.edit', compact('venta'))->with('info', 'La venta se creó con éxito!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $venta)
    {
        return view('admin.ventas.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $venta)
    {
        return view('admin.ventas.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $venta)
    {
        $request->validate([
            'pzas_venta' => 'required',
            'costo' => 'required',
            'fecha_venta' => 'required',
        ]);

        $venta->update($request->all());

        return redirect()->route('admin.ventas.edit', $venta)->with('info', 'La venta se actualizó con éxito!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(sale $venta)
    {
        $venta->saleArticle()->detach();

        return redirect()->route('admin.ventas.index')->with('info', 'ok');
    }

    public function statistics()
    {
        return view('admin.ventas.statistics');
    }

}
