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
            'nama_barang' => 'required',
            'harga_awal' => 'required|numeric|min:0',
            'jumlah' => 'required|numeric|min:0',
            'Invoice' => 'required|mimes:jpeg,png,pdf|max:2048', // Contoh validasi untuk file upload (jpeg, png, atau pdf maksimal 2MB)
        ];
    }

    public function messages()
    {
        return [
            'nama_barang.required' => 'Nama barang harus diisi.',
            'harga_awal.required' => 'Harga awal harus diisi.',
            'harga_awal.numeric' => 'Harga awal harus berupa angka.',
            'harga_awal.min' => 'Harga awal harus lebih besar atau sama dengan 0.',
            'jumlah.required' => 'Jumlah barang masuk harus diisi.',
            'jumlah.numeric' => 'Jumlah barang masuk harus berupa angka.',
            'jumlah.min' => 'Jumlah barang masuk harus lebih besar atau sama dengan 0.',
            'Invoice.required' => 'Nota pembelian (Invoice) harus diunggah.',
            'Invoice.mimes' => 'Nota pembelian (Invoice) harus berupa file jpeg, png, atau pdf.',
            'Invoice.max' => 'Ukuran nota pembelian (Invoice) maksimal 2MB.',
        ];
    }
}
