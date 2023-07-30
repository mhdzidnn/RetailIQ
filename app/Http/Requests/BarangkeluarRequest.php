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
            'nama_customer' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'harga_jual' => 'required',
            'tanggal_beli' => 'required',
            'jumlah_terjual' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'tanggal_beli.date_format' => 'Format tanggal tidak sesuai. Gunakan format YYYY/MM/DD.',
        ];
    }
}
