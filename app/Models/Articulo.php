<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaArticulo;

class Articulo extends Model
{
    use HasFactory;

    //1 a muchos 
    public function categoriaArticulo(){
        return $this-> belongsTo('App\Models\ArticuloCategoria');

    }

    public function mesaPedido(){
        return $this-> belongsTo('App\Models\MesaPedido');

    }
}
