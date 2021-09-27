<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaArticulo;

class Articulo extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre','precio','descripcion','ArticuloCategorias_id' 
    ];

    protected $fillable = [
        'nombre','precio','descripcion','ArticuloCategorias_id' 
    ];

    //1 a muchos 
    public function categoriaArticulo(){
        return $this-> belongsTo('App\Models\ArticuloCategoria');

    }

    public function mesaPedido(){
        return $this-> belongsTo('App\Models\MesaPedido');

    }
}
