<?php

namespace Database\Seeders;

use App\Models\Barangkeluar;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
class BarangkeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barangkeluar::factory()->count(20)->create();
    }
}
