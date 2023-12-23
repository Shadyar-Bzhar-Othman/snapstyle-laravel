<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use App\Models\Category;
use App\Models\CartItem;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


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

    public function create()
    {
        return view("dashboard.index", [
            'categories' => Category::all(),
            'subcategories' => SubCategory::all(),
            'sizes' => Size::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => ["required", "min:2", "max:255"],
                'description' => ["required", "min:2"],
                'category' => ["required"],
                'sizes' => ["required", "array"],
                'quantities' => ["required", "array"],
                'price' => ["required", "integer"],
            ],
        );

        $subcategory_id = $request->category;
        $category_id = SubCategory::where("id", $subcategory_id)->first()->category_id;

        $product = Product::create([
            "category_id" => $category_id,
            "subcategory_id" => $subcategory_id,
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
        ]);

        $sizes = $request->sizes;
        $quantities = $request->quantities;

        foreach ($sizes as $size => $value) {
            ProductSize::create([
                "product_id" => $product->id,
                "size_id" => $value,
                "quantity" => $quantities[$size],
            ]);
        }

        session()->flash('success', 'Product added successfully!');

        return redirect('/');
    }
}
