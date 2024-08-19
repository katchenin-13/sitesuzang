<?php

namespace Database\Factories;

use App\Models\Lang;
use Illuminate\Database\Eloquent\Factories\Factory;

class LangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'langue' => $this->faker->randomElement(['fr', 'en']),
            'status' => 'active', // Vous pouvez définir le statut par défaut ici

        ];
    }
}
