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
           
        ];
    }
}
