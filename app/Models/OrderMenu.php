<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderMenu extends Model
{
    // Tentukan nama tabel secara eksplisit jika diperlukan
    // protected $table = 'nama_tabel_order_menu';

    protected $fillable = [
        'order_id',
        'menu_id',
        'quantity'
    ];

    public function menu()
    {
        // Sesuaikan dengan nama model Menu dan kolom kunci asing
        return $this->belongsTo(Menu::class);
    }

    public function order()
    {
        // Sesuaikan dengan nama model Order dan kolom kunci asing
        return $this->belongsTo(Order::class, 'order_id');
    }
}
