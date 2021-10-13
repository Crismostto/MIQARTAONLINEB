<?php

namespace Database\Factories;

use App\Models\Articulo;
use App\Models\ArticuloCategoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticuloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articulo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $art = ArticuloCategoria::all()->random()->id;
        return [
            
            'nombre'=>$this-> faker -> name(), 
            'precio'=>$this-> faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
            'descripcion'=>$this-> faker -> text(), 
            'ArticuloCategorias_id'=>$art, 
        ];
    }
}
