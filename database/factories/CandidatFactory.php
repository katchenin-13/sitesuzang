<?php

namespace Database\Factories;

use App\Models\Candidat;
use Illuminate\Database\Eloquent\Factories\Factory;

class CandidatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Candidat::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      
        return [
            "nom" => $this->faker->lastName,
            "telephone"=> $this->faker->phoneNumber,
            "email"=> $this->faker->address,
            "cv"=>$this->faker->file,
            "post_id"=> rand(1,10)
        ];
    }
}
