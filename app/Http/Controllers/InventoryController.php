<?php

namespace App\Http\Controllers;

use App\Events\InventoryUpdated;
use App\Models\Inventory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InventoryController extends Controller
{
    /**
     * Display the inventory.
     */
    public function index()
    {
        $inventory = Inventory::all();
        confirmDelete();

        return view('inventory.index', [
            'title' => 'Inventory',
            'inventory' => $inventory
        ]);
    }

    /**
     * Show the form for creating a new inventory item.
     */
    public function create()
    {
        return view('inventory.create', [
            'title' => 'Add Item to Inventory'
        ]);
    }

    /**
     * Store a newly created inventory item in storage.
     */
    public function store(Request $request)
    {
        $inventory = Inventory::create([
            'nama_barang' => $request->nama_barang,
            'harga_awal' => $request->harga_awal,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'jumlah_terjual' => $request->jumlah_terjual,
        ]);

        event(new InventoryUpdated($inventory));

        return redirect('/inventory');
    }

    /**
     * Show the form for editing the specified inventory item.
     */
    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);

        return view('inventory.edit', [
            'title' => 'Edit Inventory Item',
            'inventory' => $inventory
        ]);
    }

    /**
     * Update the specified inventory item in storage.
     */
    public function update(Request $request,string $id)
    {
        $inventory = Inventory::findOrFail($id);

        $inventory->update([
            'nama_barang' => $request->nama_barang,
            'harga_awal' => $request->harga_awal,
            'harga_jual' => $request->harga_jual,
            'stok' => $request->stok,
            'jumlah_terjual' => $request->jumlah_terjual,
        ]);

        event(new InventoryUpdated($inventory));

        Alert::success('Berhasil Diubah', 'Data Berhasil Diubah.');

        return redirect('/inventory');
    }

    /**
     * Remove the specified inventory item from storage.
     */
    public function destroy(string $id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        Alert::success('Berhasil Dihapus', 'Data Berhasil Dihapus.');
        return redirect('/inventory');
    }
}
