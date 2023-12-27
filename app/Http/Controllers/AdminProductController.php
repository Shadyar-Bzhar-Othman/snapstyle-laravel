<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Size;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AdminProductController extends Controller
{
    public function index()
    {
        return view("dashboard.products.index", [
            'products' => Product::with("category", "subcategory")->latest()->get(),
        ]);
    }

    public function create()
    {
        return view("dashboard.products.create", [
            'categories' => Category::latest()->get(),
            'subcategories' => SubCategory::latest()->get(),
            'sizes' => Size::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => ["required", "min:2", "max:255"],
                'description' => ["required", "min:2"],
                'image' => ["required", "image"],
                'category' => ["required"],
                'sizes' => ["required", "array"],
                'quantities' => ["required", "array"],
                'price' => ["required", "integer"],
            ],
        );

        $path = $request->file('image')->store('products', "public");

        if (!$path) {
            throw ValidationException::withMessages(["error", "Unable to store the image. Please try again later"]);
        }

        $subcategory_id = $request->category;
        $category_id = SubCategory::where("id", $subcategory_id)->first()->category_id;

        $product = Product::create([
            "category_id" => $category_id,
            "subcategory_id" => $subcategory_id,
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "image" => $path,
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

        return redirect()->route('dashboard.products.index')->with('success', 'Product added successfully!');
    }

    public function edit(Product $product)
    {
        return view("dashboard.products.edit", [
            'product' => $product,
            'productsizes' => ProductSize::with(["product", "size"])->where("product_id", $product->id)->latest()->get(),
            'categories' => Category::latest()->get(),
            'subcategories' => SubCategory::latest()->get(),
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request,
            [
                'name' => ["required", "min:2", "max:255"],
                'description' => ["required", "min:2"],
                'image' => ["required", "image"],
                'category' => ["required"],
                'price' => ["required", "integer"],
            ],
        );

        $path = $request->file('image')->store('products', "public");

        if (!$path) {
            throw ValidationException::withMessages(["error", "Unable to store the image. Please try again later"]);
        }

        $oldImagePath = $product->image;

        if ($oldImagePath) {
            Storage::disk('public')->delete($oldImagePath);
        }

        $subcategory_id = $request->category;
        $category_id = SubCategory::where("id", $subcategory_id)->first()->category_id;

        $product->update([
            "category_id" => $category_id,
            "subcategory_id" => $subcategory_id,
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "image" => $path,
        ]);

        return redirect()->route('dashboard.products.index')->with('success', 'Product updated successfully!');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.products.index')->with('success', 'Product removed successfully!');
    }
}
