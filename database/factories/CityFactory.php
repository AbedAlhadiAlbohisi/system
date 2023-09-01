<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_en' => $this->faker->firstName(),
            'name_ar' => $this->faker->lastName(),
            'active' => $this->faker->boolean(50),

        ];
    }
}
