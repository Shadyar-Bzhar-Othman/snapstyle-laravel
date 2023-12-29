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
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $sizes = Size::latest()->get();

        return view("dashboard.products.create", [
            'categories' => $categories,
            'subcategories' => $subcategories,
            'sizes' => $sizes,
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

        // Upload Image to products directory and return the path if it's successful
        $path = $this->uploadImage();

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

        // Create Product Size For Each Product
        $this->createProductSizeForEachProduct($product);

        return redirect()->route('dashboard.products.index')->with('success', 'Product added successfully!');
    }

    public function createProductSizeForEachProduct(Product $product)
    {
        $sizes = request()->sizes;
        $quantities = request()->quantities;

        foreach ($sizes as $size => $value) {
            ProductSize::create([
                "product_id" => $product->id,
                "size_id" => $value,
                "quantity" => $quantities[$size],
            ]);
        }
    }

    public function uploadImage()
    {
        if (!request()->hasFile('image')) {
            return null;
        }

        $path = request()->file('image')->store('products', "public");

        if (!$path) {
            throw ValidationException::withMessages(["error", "Unable to store the image. Please try again later"]);
        }

        return $path;
    }

    public function edit(Product $product)
    {
        $productsizes = ProductSize::with(["product", "size"])->where("product_id", $product->id)->latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();

        return view("dashboard.products.edit", [
            'product' => $product,
            'productsizes' => $productsizes,
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate(
            [
                'name' => ["required", "min:2", "max:255"],
                'description' => ["required", "min:2"],
                'image' => ["image"],
                'category' => ["required"],
                'price' => ["required", "integer"],
            ],
        );

        // If there's a new image delete old one if not just upload the old one

        $oldImagePath = $product->image;

        $newImagePath = $this->uploadImage();

        $path = $newImagePath ?? $oldImagePath;

        if ($oldImagePath && $newImagePath) {
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
