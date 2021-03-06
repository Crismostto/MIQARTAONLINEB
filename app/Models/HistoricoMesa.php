<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoMesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'mesa_id','fecha_apertura', 'fecha_cierre' 
    ];

    public function mesa(){
        return $this-> belongsTo('App\Models\Mesa');

    }

    public function historicoMesaPedido(){
        return $this-> hasMany('App\Models\HistoricoMesaPedido');

    }
}
