<?php

namespace Database\Factories;

use App\Models\Newletter;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewletterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Newletter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nom"=> $this->faker->lastName,
            "adresse"=>$this->faker->email
        ];
    }
}
