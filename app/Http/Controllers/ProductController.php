<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $selectedSubcategories = $request->input('subcategories', []);

        // Use the selected filters to fetch products
        $products = Product::with('category', 'productsizes.size', 'subcategory')
            ->filterBySubcategories($selectedSubcategories)
            ->latest()->paginate(10)->withQueryString();

        return view('products.index', [
            'products' => $products,
            'categories' => Category::all(),
            'subcategories' => SubCategory::withCount('products')->get(),
        ]);
    }
}
