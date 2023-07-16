<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barangkeluar extends Model
{
    use HasFactory;

    protected $table = "barangkeluar";

    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'user_id',
        'nama_customer',
        'nama_barang',
        'harga_jual',
        'kategori',
        'tanggal_beli',
        'jumlah_terjual'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}