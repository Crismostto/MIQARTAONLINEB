<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;

class Mesa extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'estado','fechaApertura' 
    ];
    //1 a muchos
    public function pedidos(){
        return $this-> hasMany('App\Models\MesaPedido');

    }

    public function historicoMesa(){
        return $this-> hasMany('App\Models\HistoricoMesa');

    }
}
