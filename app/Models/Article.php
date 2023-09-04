<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{


    use HasFactory;

    protected $fillable = [
    'nombre',
    'tipo_articulo',
    'categoria',
    'descripcion',
    'fecha_caducidad',
    'num_pzas',
    'costo_pzas',
    'fecha_llegada',
    'codigo_barras',
    'user_id',
    ];
    //Relacion uno a muchos a la inversa

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relacion de muchos a muchos
    
    public function articleSales(){
        return $this->belongsToMany(Sale::class);
    }

    public function articleSupplier(){
        return $this->belongsToMany(Supplier::class);
    }


}
