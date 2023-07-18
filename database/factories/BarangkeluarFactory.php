<?php
use App\Models\Barangkeluar;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
            'nama_customer' => $this->faker->name(),
            'nama_barang' => $this->faker->word(),
            'harga_jual' => $this->faker->randomNumber(),
            'kategori' => $this->faker->randomElement(['Sepatu', 'Baju']),
            'tanggal_beli' => $this->faker->date(),
            'jumlah_terjual' => $this->faker->randomNumber(),
        ];
    }
}
