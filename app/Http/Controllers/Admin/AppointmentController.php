<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.appointments.index')->only('index');
        $this->middleware('can:admin.appointments.create')->only('create','store');
        $this->middleware('can:admin.appointments.edit')->only('edit','update');
        $this->middleware('can:admin.appointments.show')->only('show');
        $this->middleware('can:admin.appointments.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.appointments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $patient = Patient::pluck('nombre', 'id');

       /*  dd($patient); */

       /*  return $patient; */

        return view("admin.appointments.create", compact('patient'));
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
            'descripcion' => 'required',
            'fecha_cita' => 'required',
            'hora' => 'required',
        ]);

        $appointment = Appointment::create($request->all());

        return redirect()->route('admin.appointments.edit',  $appointment)->with('info', '¡Se ha añadido una nueva cita!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        return view('admin.appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {

        $patient = Patient::pluck('nombre', 'id');

        return view('admin.appointments.edit', compact('appointment','patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Appointment $appointment)
    {
        $request->validate([
            'descripcion' => 'required',
            'fecha_cita' => 'required',
            'hora' => 'required',
        ]);

        $appointment->update($request->all());

        return redirect()->route('admin.appointments.edit',$appointment)->with('info', 'La cita se actualizó con éxito!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('admin.appointments.index')->with('info', 'ok');
    }
}
