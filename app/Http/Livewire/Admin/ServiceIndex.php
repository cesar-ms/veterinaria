<?php

namespace App\Http\Livewire\Admin;

use App\Models\PatientService;
use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;


class ServiceIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $services = Service::where('nombre_servicio', 'LIKE', '%' . $this->search . '%')
            ->orderBy('id', 'desc')
            ->paginate();

           /*  dd($services); */

        return view('livewire.admin.service-index', compact('services'));
    }
}
