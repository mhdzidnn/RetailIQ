<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Models\Inventory;
use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the currently authenticated user

        // Retrieve necessary data from Inventory, Barangkeluar, and Barangmasuk tables for the current user
        $inventoryData = Inventory::where('user_id', $user->id)->get();
        $barangKeluarData = Barangkeluar::where('user_id', $user->id)->get();
        $barangMasukData = Barangmasuk::where('user_id', $user->id)->get();

        // Calculate total pengeluaran from Inventory data
        $totalPengeluaran = 0;
        foreach ($inventoryData as $item) {
            $totalPengeluaran += $item->harga_awal * ($item->stok + $item->jumlah_terjual);
        }

        // Calculate total pemasukan from Barangkeluar data
        $totalPemasukan = 0;
        foreach ($barangKeluarData as $item) {
            $totalPemasukan += $item->harga_jual * $item->jumlah_terjual;
        }

        // Calculate total pemasukan from Barangmasuk data
        $totalPemasukanBarangMasuk = 0;
        foreach ($barangMasukData as $item) {
            $totalPemasukanBarangMasuk += $item->harga_awal * $item->jumlah;
        }

        // Calculate total keuntungan
        $totalKeuntungan = $totalPemasukan - $totalPengeluaran + $totalPemasukanBarangMasuk;

        // Update or create a record in the Finance table
        Finance::updateOrCreate(
            [],
            [
                'total_pengeluaran' => $totalPengeluaran,
                'total_pemasukan' => $totalPemasukan,
                'total_keuntungan' => $totalKeuntungan,
            ]
        );

        return view('finance', [
            'title' => 'Finance',
            'totalPengeluaran' => $totalPengeluaran,
            'totalPemasukan' => $totalPemasukan,
            'totalKeuntungan' => $totalKeuntungan,
        ]);
    }
}
