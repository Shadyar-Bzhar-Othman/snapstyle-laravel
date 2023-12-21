<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class ProductController extends Controller
{
    public function index()
    {
        return view("index", [
            'products' => Product::latest()->simplePaginate(10)->withQueryString(),
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
        ]);
    }
}
