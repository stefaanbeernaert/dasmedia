<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacature>
 */
class VacatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description'=> $this->faker->sentence(3),
            'company' => $this->faker->name(),
            'city'=> $this->faker->city(),
            'type_id'=> $this->faker->numberBetween(1,2),

        ];
    }
}
