<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barangmasuk extends Model
{
    use HasFactory;

    protected $table = "barangmasuk";

    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'user_id',
        'nama_barang',
        'harga_awal',
        'jumlah',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
