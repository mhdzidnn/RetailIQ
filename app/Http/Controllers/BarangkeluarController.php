<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangkeluarRequest;
use App\Models\Barangkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'kategori' => $request->kategori,
            'tanggal_beli' => $request->tanggal_beli,
            'jumlah_terjual' => $request->jumlah_terjual
        ]);

        return redirect('/index-keluar');
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
        return redirect('/index-keluar');
    }
}