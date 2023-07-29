<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangkeluarRequest;
use App\Exports\BarangkeluarExport;
use App\Models\Barangkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
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
        $user = Auth::user(); // Get the currently authenticated user

        // Ambil data inventory terkait untuk user saat ini berdasarkan 'nama_barang'
        $inventory = Inventory::where('nama_barang', $request->nama_barang)
                                ->where('user_id', $user->id)
                                ->first();

        // Validasi input 'jumlah_terjual' terhadap data 'jumlah_terjual' dalam $inventory
        $validator = Validator::make($request->all(), [
            'jumlah_terjual' => 'required|numeric|min:1|max:' . ($inventory ? $inventory->jumlah_terjual : 0),
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        // Handle file upload (optional, if you have a file to upload)
        $originalFilename = null;
        $encryptedFilename = null;
        if ($request->hasFile('file_upload')) {
            $file = $request->file('file_upload');
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();
            $file->store('public/files');
        }


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
            $inventory->harga_jual = $request->harga_jual;
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

    public function downloadFile($barangkeluarId)
    {
        $barangkeluar = Barangkeluar::findOrFail($barangkeluarId);

        // Pastikan file invoice ada sebelum melanjutkan
        if ($barangkeluar->original_filename && Storage::exists('public/files/' . $barangkeluar->encrypted_filename)) {
            $path = storage_path('app/public/files/' . $barangkeluar->encrypted_filename);
            return response()->download($path, $barangkeluar->original_filename);
        } else {
            // Jika file tidak ditemukan, Anda dapat mengembalikan response sesuai kebutuhan.
            return response()->json(['message' => 'File tidak ditemukan'], 404);
        }
    }

    public function exportExcel()
    {
        return Excel::download(new BarangkeluarExport, 'barangkeluar.xlsx');
    }

    public function exportPdf()
    {
        $barangkeluar = Barangkeluar::all();
        $pdf = PDF::loadView('barangkeluar.export_pdf', compact('barangkeluar'));
        return $pdf->download('barangkeluar.pdf');
    }
}

