<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

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
            "objet" => $this->faker->text(80),
            "adresse"=> $this->faker->address,
            "msg" => $this->faker->text(100)
        ];
    }
}
