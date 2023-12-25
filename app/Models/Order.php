<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function scopeFilter($query, $state)
    {
        $query->when($state ?? false, fn($query, $state) =>
            $query->whereHas('state', fn($query) => $query->where('id', $state))
        );
    }

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
