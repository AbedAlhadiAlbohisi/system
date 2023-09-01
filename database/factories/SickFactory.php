<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SickFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'First_name' => $this->faker->firstName(),
            'Last_name' => $this->faker->firstName(),
            'phone' => $this->faker->phoneNumber(),
            'city' => $this->faker->city(),
            'ID_namber' => $this->faker->number(),
            'danger' => $this->faker->boolean(50),

        ];
    }
}
