<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticuloCategoria extends Model
{
    use HasFactory;

      protected $fillable = ['nombre'];

      //1 a muchos 
      public function articulos(){
        return $this-> hasMany('App\Models\Articulo');
    }
}
