<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Size;
use App\Models\Product;
use App\Models\ProductSize;

class AdminUserController extends Controller
{
    public function index()
    {
        // Complete it
        return view("dashboard.users.index", []);
    }

    public function create()
    {
        return view("dashboard.users.create", [
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

    public function edit(User $user)
    {
        // Complete it
        return view("dashboard.users.edit", [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        // Complete it
    }

    public function destroy(User $user)
    {
        // Complete it
    }
}
