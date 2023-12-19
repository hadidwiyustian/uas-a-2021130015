<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'status',
    ];
    public function orderItems()
    {
        return $this->hasMany(OrderMenu::class);
    }

    public function orderMenu()
    {
        return $this->hasMany(OrderMenu::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }
}
