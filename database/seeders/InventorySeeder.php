<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first(); // Ganti dengan cara yang sesuai untuk mendapatkan pengguna yang ingin Anda gunakan

        Inventory::factory()
            ->count(10)
            ->create(['user_id' => $user->id]);

    }
}
