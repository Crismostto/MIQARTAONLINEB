<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Articulo;

class CategoriaArticulo extends Model
{
    use HasFactory;

    
    //1 a muchos 
    public function articulos(){
        return $this-> hasMany('App\Models\Articulo');

    }
}
