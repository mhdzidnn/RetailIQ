<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Barangkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\BarangkeluarExport;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\BarangkeluarRequest;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $inventory = Barangkeluar::where('user_id', $user->id)->get(); // Fetch inventory data for the current user
        confirmDelete();

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
        $validator = Validator::make($request->all(), [
            'jumlah_terjual' => $inventory->jumlah_terjual,
        ]);


        $user = Auth::user(); // Get the currently authenticated user

        Barangkeluar::create([
            'user_id' => $user->id,
            'nama_customer' => $request->nama_customer,
            'nama_barang' => $request->nama_barang,
            'harga_jual' => $request->harga_jual,
            'tanggal_beli' => $request->tanggal_beli,
            'jumlah_terjual' => $request->jumlah_terjual,


        ]);


        //  // Update entri Inventory
        $inventory = Inventory::where('nama_barang', $request->nama_barang)->first();

        if ($inventory) {
            $inventory->stok -= $request->jumlah_terjual;
            $inventory->jumlah_terjual += $request->jumlah_terjual;
            $inventory->save();
        }

        Alert::success('Berhasil Ditambahkan', 'Data Berhasil Ditambahkan.');
        return redirect('/barangkeluar');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

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
        // Hapus file CV jika ada
        if ($selected->encrypted_filename) {
            Storage::disk('public')->delete('files/' . $selected->encrypted_filename);
        }

        $selected->delete();

        Alert::success('Berhasil Dihapus', 'Data Berhasil Dihapus.');
        return redirect('/barangkeluar');
    }
}

