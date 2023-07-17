<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangkeluarRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // Atur aturan validasi untuk setiap field yang dibutuhkan
            'nama_customer' => 'required',
            'nama_barang' => 'required',
            'harga_jual' => 'required|numeric',
            'kategori' => 'required',
            'tanggal_beli' => 'required',
            'jumlah_terjual' => 'required|numeric'
        ];
    }
}
