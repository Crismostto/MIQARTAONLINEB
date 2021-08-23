<?php

namespace Database\Factories;

use App\Models\CategoriaArticulo;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaArticuloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoriaArticulo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'name' => $this->faker->name(),
            //
            'tipo'=>$this-> faker-> numberBetween($min=1 , $max=10),
            'nombre'=>$this-> faker -> name(), 
        ];
    }
}
