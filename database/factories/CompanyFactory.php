<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->Email(),
            'address' => $this->faker->Address(),
            'latitude' => $this->faker->Latitude(),
            'longitude' => $this->faker->Longitude(),
            'phone' => $this->faker->phoneNumber(),
            'created_at' => now(),
        ];
    }
}
