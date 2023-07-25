<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barangmasuk>
 */
class BarangmasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'nama_barang' => $this->faker->word(),
            'harga_awal' => $this->faker->randomNumber(),
            'jumlah' => $this->faker->randomNumber(),
        ];
    }
}
