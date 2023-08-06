<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barangmasuk;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Panggil Factory untuk membuat 10 record Barangmasuk palsu
        Barangmasuk::factory()->count(50)->create();
    }
}
