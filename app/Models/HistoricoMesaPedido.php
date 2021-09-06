<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoMesaPedido extends Model
{
    use HasFactory;

    public function historicoMesa(){
        return $this-> belongsTo('App\Models\HistoricoMesa');

    }
}
