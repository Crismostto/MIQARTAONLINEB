<?php

namespace Database\Factories;

use App\Models\Articulo;
use App\Models\HistoricoMesa;
use App\Models\HistoricoMesaPedido;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoricoMesaPedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HistoricoMesaPedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $art = Articulo::all()->random()->id;
        $HistMesa = HistoricoMesa::all()->random()->id;
        return [
            'precio'=>$this-> faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'cantidad'=>$this-> faker->numberBetween($min = 1, $max = 20),
            'articulo_id'=>$art,
            'historicoMesa_id'=>$HistMesa
        ];
    }
}
