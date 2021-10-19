<?php

namespace Database\Factories;

use App\Models\ArticuloCategoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticuloCategoriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ArticuloCategoria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'name' => $this->faker->name(),
            
            
            'nombre'=>$this-> faker -> name(), 
        ];
    }
}
