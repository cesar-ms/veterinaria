<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['responsable','pzas_venta','costo','fecha_venta'];

    public function saleArticle(){
        return $this->belongsToMany(Article::class)->withPivot('id');
    }

}