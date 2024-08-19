<?php

namespace Database\Factories;

use App\Models\Contenu;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contenu::class;

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
            "imageUrl" => $this->faker->imageUrl(),
            "type"=> $this->faker->unique()->lastName,
            "user_id"=> rand(1,10)
            
        ];
    }
}