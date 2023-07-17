<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangmasukRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // Atur aturan validasi untuk setiap field yang dibutuhkan

            'nama_barang' => 'required',
            'harga_beli' => 'required|numeric',
            'kategori' => 'required',
            'jumlah_stok' => 'required|numeric'
        ];
    }
}
