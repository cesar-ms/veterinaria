<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion','fecha_cita','hora','paciente_id'];
    //Relacion de uno a muchos a la inversa
    
    public function patient(){
        return $this->belongsTo(Patient::class,'paciente_id');
    }
}
