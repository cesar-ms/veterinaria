<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Article;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter;

class PatientController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.patients.index')->only('index');
        $this->middleware('can:admin.patients.create')->only('create','store');
        $this->middleware('can:admin.patients.edit')->only('edit','update');
        $this->middleware('can:admin.patients.show')->only('show');
        $this->middleware('can:admin.patients.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.patients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.patients.create');
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
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'nombre_mascota' => 'required',
            'edad_mascota' => 'required',
            'tmp_nacimiento' => 'required',
            'peso_mascota' => 'required',
            'tipo' => 'required',
            'raza' => 'required',
            'diagnostico' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
        ]);

        $patient = new Patient();

        $patient->nombre = $request->nombre;
        $patient->ap_paterno = $request->ap_paterno;
        $patient->ap_materno = $request->ap_materno;
        $patient->nombre_mascota = $request->nombre_mascota;
        $patient->edad_mascota = $request->edad_mascota;
        $patient->tmp_nacimiento = $request->tmp_nacimiento;
        $patient->peso_mascota = $request->peso_mascota;
        $patient->tipo = $request->tipo;
        $patient->raza = $request->raza;
        $patient->diagnostico = $request->diagnostico;
        $patient->telefono = $request->telefono;
        $patient->correo = $request->correo;
        $patient->save();

        $id = Auth::id();

        $patient->user()->attach($id);

        return redirect()->route('admin.patients.edit', compact('patient'))->with('info', '!Paciente registrado¡');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(patient $patient)
    {
        return view('admin.patients.show', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(patient $patient)
    {
        return view('admin.patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
        $request->validate([
            'nombre' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'tipo' => 'required',
            'diagnostico' => 'required',
            'telefono' => 'required',
        ]);

        $patient->update($request->all());

        return redirect()->route('admin.patients.edit', $patient)->with('info', '¡¡El historial clínico se actualizó correctamente!!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->user()->detach();
        $patient->patientService()->detach();
        Appointment::where('paciente_id', $patient->id)->delete();
       /*  $patient->appointment()->where(); */
        $patient->delete();

        return redirect()->route('admin.patients.index')->with('info', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function receta(Patient $patient)
    {
        $user = User::all();

        return view('admin.patients.receta', compact('patient', 'user'));
    }

    /*   public $searchMed; */


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function cotizar(Request $request,Patient $patient)
    {
        return view('admin.patients.cotizar', compact('patient'));
    }
}
