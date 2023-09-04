<?php

namespace App\Http\Livewire\Admin;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
       
       /*  $appointments = Appointment::where('descripcion', 'LIKE', '%'. $this->search .'%')
        ->orWhere('fecha_cita', 'LIKE', '%'. $this->search .'%')
        ->orWhere('hora', 'LIKE', '%'. $this->search .'%')
        ->orderBy('id','desc')->paginate();
        */
        
        $appointments = Appointment::join('patients', 'patients.id', '=', 'appointments.paciente_id')
             ->select('appointments.*', 'patients.nombre')
             ->where('patients.nombre', 'LIKE', '%' . $this->search . '%')
             ->orWhere('appointments.descripcion', 'LIKE', '%'. $this->search . '%')
             ->orWhere('appointments.fecha_cita', 'LIKE', '%'. $this->search .'%')
             ->orWhere('appointments.hora', 'LIKE',  $this->search .'%')
             ->orderBy('id', 'desc')
             ->paginate();

        return view('livewire.admin.appointment-index', compact('appointments'));
    }
}
