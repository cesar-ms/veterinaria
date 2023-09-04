<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StatisticsService extends Component
{
    public $totalMes = 0, $mesActual, $anioActual;

    public function render()
    {
    
        DB ::statement("SET lc_time_names = 'es_MX'");
       
        $dt = Carbon::now();
        $mes = $dt->month;
        $anio = $dt->year;

        
        $this->mesActual =  $dt->monthName;
        $this->anioActual = $anio;
        

        $ventas = Service::whereMonth('fecha_servicio', $mes)->whereYear('fecha_servicio', $anio)->select(
            DB::raw("count(*) as count"),
            DB::raw("SUM(costo) as total"),
            DB::raw("DATE_FORMAT(fecha_servicio,'%d de %M del %Y') as fecha")
        )->groupBy('fecha')->get();

        $data = [];

        foreach ($ventas as $venta) {

            $data['label'][] = $venta->fecha;
            $data['data'][] = $venta->total;
            $this->totalMes += $venta->total;
        }

        $data['data'] = json_encode($data);


        return view('livewire.admin.statistics-service',$data);
    }
}
