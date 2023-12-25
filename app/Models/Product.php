<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeFilterBySubcategories($query, $subcategories)
    {
        return $query->when($subcategories, function ($query, $subcategories) {
            $query->whereHas('subcategory', function ($query) use ($subcategories) {
                $query->whereIn('id', $subcategories);
            });
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id');
    }


    public function productsizes()
    {
        return $this->hasMany(ProductSize::class);
    }
}
