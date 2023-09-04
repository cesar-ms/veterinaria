<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ap_paterno',
        'ap_materno',
        'nombre_mascota',
        'edad_mascota',
        'tmp_nacimiento',
        'peso_mascota',
        'tipo',
        'raza',
        'telefono',
        'correo',
    ];

    //Relacion de uno a muchos inversa

    public function user(){
        return $this->belongsToMany(User::class)->withPivot('id');
    }

    //Relacion de muchos a muchos
    
    public function appointment(){
        return $this->hasMany(Appointment::class);
    }

    public function patientService(){
        return $this->belongsToMany(Service::class);
    }

}
