<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangmasukRequest;
use App\Models\Barangmasuk;
use App\Models\Inventory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    // app/Http/Controllers/BarangmasukController.php

    public function store(BarangmasukRequest $request)
    {
        // Kode validasi di dalam request akan dijalankan secara otomatis saat method ini dipanggil.
        // Jika validasi gagal, pengguna akan diarahkan kembali ke halaman form dengan pesan error.

        // Dapatkan user yang saat ini terotentikasi
        $user = Auth::user();

        // Handle file upload
        $originalFilename = null;
        $encryptedFilename = null;
        if ($request->hasFile('Invoice')) {
            $file = $request->file('Invoice');
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();
            $file->store('public/files');
        }

        // Simpan data ke dalam database setelah validasi berhasil
        $barangmasuk = Barangmasuk::create([
            'user_id' => $user->id,
            'nama_barang' => $request->nama_barang,
            'harga_awal' => $request->harga_awal,
            'jumlah' => $request->jumlah,
            'original_filename' => $originalFilename,
            'encrypted_filename' => $encryptedFilename,
        ]);

        // Update atau buat entri Inventory
        $inventory = Inventory::updateOrCreate(
            ['nama_barang' => $request->nama_barang],
            [
                'harga_awal' => $request->harga_awal,
                'stok' => DB::raw('stok + ' . $request->jumlah),
            ]
        );

        return redirect('/barangmasuk');
    }




    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $barangmasuk = Barangmasuk::findOrFail($id);

        return view('barangmasuk.show-masuk', [
            'title' => 'Detail Barang Masuk',
            'barangmasuk' => $barangmasuk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barangmasuk = Barangmasuk::findOrFail($id);
        return view('barangmasuk.edit-masuk', [
            'title' => 'Edit Barang Masuk',
            'selected' => $barangmasuk
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BarangmasukRequest $request, $id)
    {
        $data = $request->validated();

        $barangmasuk = Barangmasuk::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('Invoice')) {
            // Hapus file CV lama jika ada
            if ($barangmasuk->encrypted_filename) {
                Storage::disk('public')->delete('files/' . $barangmasuk->encrypted_filename);
            }

            // Upload file CV yang baru
            $file = $request->file('Invoice');
            $data['original_filename'] = $file->getClientOriginalName();
            $data['encrypted_filename'] = $file->storeAs('public/files', $file->hashName());
        }

        $barangmasuk->update($data);

        return redirect('/barangmasuk');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $selected = Barangmasuk::findOrFail($id);

        // Hapus file CV jika ada
        if ($selected->encrypted_filename) {
            Storage::disk('public')->delete('files/' . $selected->encrypted_filename);
        }

        // Hapus data Barangmasuk
        $selected->delete();

        return redirect('/barangmasuk');
    }

    public function downloadFile($barangmasukId)
    {
        $barangmasuk = Barangmasuk::findOrFail($barangmasukId);

        // Pastikan file invoice ada sebelum melanjutkan
        if ($barangmasuk->original_filename && Storage::exists('public/files/' . $barangmasuk->encrypted_filename)) {
            $path = storage_path('app/public/files/' . $barangmasuk->encrypted_filename);
            return response()->download($path, $barangmasuk->original_filename);
        } else {
            // Jika file tidak ditemukan, Anda dapat mengembalikan response sesuai kebutuhan.
            return response()->json(['message' => 'File tidak ditemukan'], 404);
        }
    }

}
