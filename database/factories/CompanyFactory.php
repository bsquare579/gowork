<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
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
        $status = $this->faker->randomElement([0, 1]);
        return [
            //
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->Email(),
            'address' => $this->faker->Address(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'phone' => $this->faker->phoneNumber(),
            'created_by' => User::factory(),
            'status' => $status,
            'created_at' => now(),
        ];
    }
}
