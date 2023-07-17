<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangmasukRequest;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $inventory = Barangmasuk::where('user_id', $user->id)->get(); // Fetch inventory data for the current user

        return view('barangmasuk.index-masuk', [
            'title' => 'Barang Masuk',
            'barangmasuk' => $inventory
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barangmasuk.create-masuk', [
            'title' => 'Input Barang Masuk'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangmasukRequest $request)
    {
        $user = Auth::user(); // Get the currently authenticated user

        Barangmasuk::create([
            'user_id' => $user->id, // Mengubah menjadi $user->id
            'nama_barang' => $request->nama_barang,
            'harga_beli' => $request->harga_beli,
            'kategori' => $request->kategori,
            'jumlah_stok' => $request->jumlah_stok,
        ]);


        return redirect('/barangmasuk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barangmasuk $barangmasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $selected = Barangmasuk::findOrFail($id);
        return view('barangmasuk.edit-masuk', [
            'title' => 'Edit Barang Masuk',
            'selected' => $selected
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BarangmasukRequest $request, $id)
    {
        $data = $request->validated();

        $barangmasuk = Barangmasuk::findOrFail($id);
        $barangmasuk->update($data);

        return redirect('/index-masuk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $selected = Barangmasuk::findOrFail($id);
        $selected->delete();
        return redirect('/index-masuk');
    }
}
