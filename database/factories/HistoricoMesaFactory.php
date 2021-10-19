<?php

namespace Database\Factories;

use App\Models\Mesa;
use App\Models\HistoricoMesa;
use Illuminate\Database\Eloquent\Factories\Factory;

class HistoricoMesaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HistoricoMesa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $mesa = Mesa::all()->random()->id;
        return [
            'mesa_id'=>$mesa,
            
            'fecha_apertura'=>$this-> faker->dateTime($max = 'now', $timezone = null),
            'fecha_cierre'=>$this-> faker->dateTime($max = 'now', $timezone = null)
        ];
    }
}
