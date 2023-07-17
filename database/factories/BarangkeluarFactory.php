<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barangkeluar>
 */
class BarangkeluarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(),
            'nama_customer' => $this->faker->name(),
            'nama_barang' => $this->faker->word(),
            'harga_jual' => $this->faker->randomNumber(),
            'kategori' => $this->faker->randomElement(['Sepatu', 'Baju']),
            'tanggal_beli' => $this->faker->date(),
            'jumlah_terjual' => $this->faker->randomNumber(),

        ];
    }
}
