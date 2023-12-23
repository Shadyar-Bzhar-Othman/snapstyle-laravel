<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public $guarded = [];

    public function cartitems()
    {
        return $this->hasMany(CartItem::class);
    }
}
