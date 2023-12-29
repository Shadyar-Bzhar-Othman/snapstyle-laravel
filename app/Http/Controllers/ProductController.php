<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class ProductController extends Controller
{
    public function index()
    {
        $selectedSubcategories = request()->input('subcategories', []);

        $products = Product::with('category', 'productsizes.size', 'subcategory')
            ->filterBySubcategories($selectedSubcategories)
            ->latest()->paginate(10)->withQueryString();

        $categories = Category::all();
        $subcategories = SubCategory::withCount('products')->get();

        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }
}
