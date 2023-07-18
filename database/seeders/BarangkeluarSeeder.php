<?php
use App\Models\Barangkeluar;
use Illuminate\Database\Seeder;

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
