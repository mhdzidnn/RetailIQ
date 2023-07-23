<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangkeluarRequest;
use App\Models\Barangkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $inventory = Barangkeluar::where('user_id', $user->id)->get(); // Fetch inventory data for the current user

        return view('barangkeluar.index-keluar', [
            'title' => 'Barang Keluar',
            'barangkeluar' => $inventory
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barangkeluar.create-keluar', [
            'title' => 'Input Barang Keluar'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangkeluarRequest $request)
    {
        $user = Auth::user(); // Get the currently authenticated user

        Barangkeluar::create([
            'user_id' => $user->id,
            'nama_customer' => $request->nama_customer,
            'nama_barang' => $request->nama_barang,
            'harga_jual' => $request->harga_jual,
            'tanggal_beli' => $request->tanggal_beli,
            'jumlah_terjual' => $request->jumlah_terjual
        ]);

        // Lakukan proses pengurangan stok dan penambahan jumlah terjual pada inventory
        $inventory = Inventory::where('nama_barang', $request->nama_barang)->first();

        if ($inventory) {
            // Pastikan stok yang ada tidak kurang dari jumlah barang yang keluar
            $stok_saat_ini = $inventory->stok;
            $jumlah_keluar = $request->jumlah_terjual;
            if ($stok_saat_ini >= $jumlah_keluar) {
                $inventory->stok -= $jumlah_keluar;
                $inventory->jumlah_terjual += $jumlah_keluar;
                // Update atau tambahkan harga jual di inventory berdasarkan barang yang dikeluarkan
                $inventory->harga_jual = $request->harga_jual;

                $inventory->save();
            } else {
                // Tambahkan logika jika stok tidak mencukupi untuk barang yang keluar
                // Misalnya, munculkan pesan error atau tampilkan halaman khusus
                return redirect()->back()->with('error', 'Stok tidak mencukupi.');
            }
        }

        return redirect('/barangkeluar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barangkeluar $barangkeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $selected = Barangkeluar::findOrFail($id);
        return view('barangkeluar.edit-keluar', [
            'title' => 'Edit Barang Keluar',
            'selected' => $selected
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BarangkeluarRequest $request, $id)
    {
        $data = $request->validated();

        $barangmasuk = Barangkeluar::findOrFail($id);
        $barangmasuk->update($data);

        return redirect('/index-keluar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $selected = Barangkeluar::findOrFail($id);
        $selected->delete();
        return redirect('/barangkeluar');
    }
}
