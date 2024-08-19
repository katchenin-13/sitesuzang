<?php

namespace Database\Factories;

use App\Models\Atout;
use Illuminate\Database\Eloquent\Factories\Factory;

class AtoutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Atout::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "titre" => $this->faker->lastName,
            "extrait" => $this->faker->text(200),
            "contenu" => $this->faker->text(200),
            // "imageUrl" => $this->faker->imageUrl()
          
            
        ];
    }
}
