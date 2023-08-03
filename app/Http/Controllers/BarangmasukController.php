<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Inventory;
use App\Models\Barangmasuk;
use App\Exports\BarangmasukExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\BarangmasukRequest;
use Illuminate\Http\Request;
use DataTables;



class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Get the currently authenticated user
        $inventory = Barangmasuk::where('user_id', $user->id)->get(); // Fetch inventory data for the current user
        confirmDelete();

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

        Alert::success('Berhasil Ditambahkan', 'Data Berhasil Ditambahkan.');

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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BarangmasukRequest $request, $id)
    {

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

        Alert::success('Berhasil Dihapus', 'Data Berhasil Dihapus.');

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

    public function exportExcel()
    {
        $directoryPath = 'path/to/directory';

        // Periksa apakah direktori sudah ada, jika belum, buat direktori
        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }
        return Excel::download(new BarangmasukExport, 'barangmasuk.xlsx');
    }

    public function exportPdf()
    {
        $barangmasuk = Barangmasuk::all();
        $pdf = PDF::loadView('barangmasuk.export_pdf', compact('barangmasuk'));
        return $pdf->download('barangmasuk.pdf');
    }

    public function getData(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user
        $barangmasuk = Barangmasuk::where('user_id', $user->id);

        return DataTables::of($barangmasuk)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                $btn = '<a href="' . route('show', ['id' => $row->id]) . '" class="btn btn-warning">
                            <i class="bi bi-eye"></i>
                        </a>';
                $btn .= ' <form action="' . route('barangmasuk.destroy', ['id' => $row->id]) . '" method="POST" style="display: inline;">
                            ' . csrf_field() . '
                            ' . method_field("DELETE") . '
                            <button type="submit" class="btn-delete btn btn-danger" data-name="' . $row->nama_barang . '">
                                <i class="bi-trash"></i>
                            </button>
                        </form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

}







