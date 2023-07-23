<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangkeluarRequest;
use App\Exports\BarangkeluarExport; // Pastikan Anda telah mengimpor BarangkeluarExport
use App\Models\Barangkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel; // Pa
use PDF;


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
        // Handle file upload
        $originalFilename = null;
        $encryptedFilename = null;
        if ($request->hasFile('Invoice')) {
            $file = $request->file('Invoice');
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();
            $file->store('public/files');
        }
        $barangkeluar=Barangkeluar::create([
            'user_id' => $user->id,
            'nama_customer' => $request->nama_customer,
            'nama_barang' => $request->nama_barang,
            'harga_jual' => $request->harga_jual,
            'tanggal_beli' => $request->tanggal_beli,
            'jumlah_terjual' => $request->jumlah_terjual,
            'original_filename' => $originalFilename,
            'encrypted_filename' => $encryptedFilename,
        ]);

        // Update atau buat entri Inventory
        $inventory = Inventory::updateOrCreate(
            ['nama_barang' => $request->nama_barang],
            [
                'harga_jual' => $request->harga_jual, 
                'tanggal_beli' => $request->tanggal_beli,
                'stok' => DB::raw('stok + ' . $request->jumlah_terjual),
            ]
        );

        // Simpan data barangmasuk
        $barangkeluar->save();

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

        $barangkeluar = Barangkeluar::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('Invoice')) {
            // Hapus file CV lama jika ada
            if ($barangkeluar->encrypted_filename) {
                Storage::disk('public')->delete('files/' . $barangkeluar->encrypted_filename);
            }

            // Upload file CV yang baru
            $file = $request->file('Invoice');
            $data['original_filename'] = $file->getClientOriginalName();
            $data['encrypted_filename'] = $file->storeAs('public/files', $file->hashName());
        }

        $barangkeluar->update($data);
        return redirect('/barangkeluar');
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

