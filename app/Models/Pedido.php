<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    
    //1 a muchos 
    public function mesa(){
        return $this-> belongsTo('App\Models\Mesa');

    }
    
    //1 a muchos 
    public function articulos(){
        return $this-> hasMany('App\Models\Articulo');

    }
    
}
