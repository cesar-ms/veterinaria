<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\PatientService;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.services.index')->only('index');
        $this->middleware('can:admin.services.create')->only('create','store');
        $this->middleware('can:admin.services.edit')->only('edit','update');
        $this->middleware('can:admin.services.show')->only('show');
        $this->middleware('can:admin.services.destroy')->only('destroy');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patient = Patient::pluck('nombre', 'id');

        return view('admin.services.create',compact('patient'));
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
            'nombre_servicio' => 'required',
            'tipo' => 'required',
            'fecha_servicio' => 'required',
            'hora' => 'required',
            'costo' => 'required',
        ]);

        $service = Service::create($request->all());

        $service->servicePatient()->attach($request->patient_id);

        return redirect()->route('admin.services.edit', $service)->with('info', '¡Se ha añadido un nuevo servicio!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
       return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nombre_servicio' => 'required',
            'tipo' => 'required',
            'fecha_servicio' => 'required',
            'hora' => 'required',
            'costo' => 'required',
        ]);

        $service->update($request->all());

        return redirect()->route('admin.services.edit', compact('service'))->with('info', 'El servicio se actualizó con éxito!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {

        PatientService::destroy($service->id);
        $service->delete();

        return redirect()->route('admin.services.index')->with('info', 'ok');
    }

    public function statistics()
    {
        return view('admin.services.statistics');
    }

}
