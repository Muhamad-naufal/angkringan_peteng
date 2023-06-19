<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Makanan>
 */
class MakananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_makanan' => $this->faker->word(),
            'jum_makanan' => $this->faker->numberBetween(5, 10),
            'harga_makanan' => $this->faker->numberBetween(10000, 50000),
        ];
    }
}
