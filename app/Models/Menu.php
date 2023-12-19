<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $primaryKey = 'id';
    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = ['id', 'nama', 'rekomendasi', 'harga', 'kategori'];

    // Tambahan relasi atau method lainnya jika diperlukan
}

