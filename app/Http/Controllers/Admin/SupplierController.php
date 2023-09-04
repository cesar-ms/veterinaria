<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.suppliers.index')->only('index');
        $this->middleware('can:admin.suppliers.create')->only('create','store');
        $this->middleware('can:admin.suppliers.edit')->only('edit','update');
        $this->middleware('can:admin.suppliers.show')->only('show');
        $this->middleware('can:admin.suppliers.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.suppliers.create');
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
            'razon_social'=> 'required',
            'fabricante'=> 'required',
            'telefono'=> 'required',
        ]);

        $supplier = Supplier::create($request->all());

        return redirect()->route('admin.suppliers.edit', $supplier)->with('info', '¡Se ha añadido un nuevo proveedor!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {

        /* $articles = $supplier->supplierArticle; */

        return view('admin.suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('admin.suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'razon_social'=> 'required',
            'fabricante'=> 'required',
            'telefono'=> 'required',
            'correo'=> 'required'
        ]);

        $supplier->update($request->all());

        return redirect()->route('admin.suppliers.edit', $supplier)->with('info', '¡Actualización exitosa!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->supplierArticle()->detach();
        $supplier->delete();

        return redirect()->route('admin.suppliers.index')->with('info', 'ok');
    }
}
