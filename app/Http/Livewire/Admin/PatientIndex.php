<?php

namespace App\Http\Livewire\Admin;

use App\Models\PatientUser;
use App\Models\Patient;
use Livewire\Component;
use Livewire\WithPagination;

class PatientIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {

        $patients = Patient::where('nombre', 'LIKE', '%' . $this->search . '%')
        ->orWhere('nombre_mascota', 'LIKE','%' . $this->search . '%')
        ->orderBy('id', 'desc')
        ->paginate();

        return view('livewire.admin.patient-index', compact('patients'));
    }
}
