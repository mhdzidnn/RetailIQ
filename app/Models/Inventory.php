<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';

    protected $fillable = [
        'nama_barang',
        'harga_awal',
        'harga_jual',
        'stok',
        'jumlah_terjual',
    ];
}
