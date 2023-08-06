<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barangmasuk;
// use App\Database\Factories\BarangmasukFactory;

class BarangmasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menggunakan Factory untuk membuat 10 data palsu
        Barangmasuk::factory()->count(50)->create();
    }
}
