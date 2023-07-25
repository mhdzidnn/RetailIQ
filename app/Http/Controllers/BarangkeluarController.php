<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangkeluarRequest;
use App\Models\Barangkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BarangkeluarExport;
use PDF;
use Illuminate\Support\Facades\Storage;

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
        $user = Auth::user();

        // Ambil data inventory berdasarkan nama barang
        $inventory = Inventory::where('nama_barang', $request->nama_barang)->first();

        if (!$inventory) {
            // Jika data inventory tidak ditemukan, berarti barang belum ada di inventory.
            // Anda bisa menambahkan logika lain, seperti memberikan pesan error dan sebagainya.
            return redirect()->back()->with('error', 'Barang tidak ditemukan dalam inventory.');
        }

        if ($request->jumlah_terjual > $inventory->stok) {
            // Jika jumlah terjual lebih besar dari stok yang ada di inventory,
            // berikan pesan error dan arahkan kembali ke halaman input barang keluar.
            return redirect()->back()->with('error', 'Jumlah terjual melebihi stok yang ada dalam inventory.');
        }

        // Jika stok cukup, simpan data barang keluar dan update entri inventory
        Barangkeluar::create([
            'user_id' => $user->id,
            'nama_customer' => $request->nama_customer,
            'nama_barang' => $request->nama_barang,
            'harga_jual' => $request->harga_jual,
            'tanggal_beli' => $request->tanggal_beli,
            'jumlah_terjual' => $request->jumlah_terjual
        ]);

        // Update entri Inventory
        $inventory->stok -= $request->jumlah_terjual;
        $inventory->jumlah_terjual += $request->jumlah_terjual;
        $inventory->harga_jual = $request->harga_jual;
        $inventory->save();

        return redirect('/barangkeluar');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $barangkeluar = Barangkeluar::findOrFail($id);

        return view('barangkeluar.show-keluar', [
            'title' => 'Detail Barang Keluar',
            'barangkeluar' => $barangkeluar
        ]);
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
    public function downloadFile($barangkeluarId)
    {
        $barangkeluar = Barangkeluar::findOrFail($barangkeluarId);

        // Pastikan file invoice ada sebelum melanjutkan
        if ($barangkeluar->original_filename && Storage::exists('public/files/' . $barangkeluar->encrypted_filename)) {
            $path = storage_path('app/public/files/' . $barangkeluar->encrypted_filename);
            return response()->download($path, $barangkeluar->original_filename);
        } else {
            // Jika file tidak ditemukan, Anda dapat mengembalikan response sesuai kebutuhan.
            return response()->json(['message' => 'File ini tidak ditemukan'], 404);}
    }
    public function exportExcel()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $barangkeluar = Barangkeluar::where('user_id', $user->id)->get(); // Fetch data for the current user

        return Excel::download(new BarangkeluarExport(), 'barangkeluar.xlsx');
    }
    public function exportPdf()
    {
        $barangkeluar    = Barangkeluar::all();

        $pdf = PDF::loadView('barangkeluar.export_pdf', compact('barangkeluar'));

        return $pdf->download('barangkeluar.pdf');
    }
}
