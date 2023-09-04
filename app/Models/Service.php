<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_servicio',
        'tipo',
        'fecha_servicio',
        'hora',
        'costo'
    ];

    public function servicePatient(){
        return $this->belongsToMany(Patient::class)->withPivot('id');
    }
}
