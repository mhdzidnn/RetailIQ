<?php

namespace Database\Factories;

use App\Models\Barangmasuk;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class BarangmasukFactory extends Factory
{
    protected $model = Barangmasuk::class;

    public function definition()
    {
        // Ambil user yang ada atau buat user baru jika tidak ada
        $userId = User::inRandomOrder()->first()->id ?? User::factory()->create()->id;

        return [
            'user_id' => $userId, // Jika Anda memiliki relasi dengan model User
            'nama_barang' => $this->faker->word,
            'harga_awal' => $this->faker->numberBetween(1000, 10000),
            'jumlah' => $this->faker->numberBetween(1, 100),
            // Tambahkan field lain sesuai kebutuhan...
        ];
    }
}
