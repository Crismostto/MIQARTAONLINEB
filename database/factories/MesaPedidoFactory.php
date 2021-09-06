<?php

namespace Database\Factories;

use App\Models\MesaPedido;
use App\Models\Mesa;
use App\Models\Articulo;
use Illuminate\Database\Eloquent\Factories\Factory;

class MesaPedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MesaPedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $art = Articulo::all()->random()->id;
        $mesa = Mesa::all()->random()->id;
        return [
            'precio'=>$this-> faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'cantidad'=>$this-> faker->numberBetween($min = 1, $max = 20),
            'articulo_id'=>$art,
            'mesa_id'=>$mesa
        ];
    }
}
