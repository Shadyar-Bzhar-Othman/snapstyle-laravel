<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Http\Request;

class AdminProductSizeController extends Controller
{
    public function create(Product $product)
    {
        $sizesWithoutSizeInProduct = Size::whereNotIn('id', function ($query) use ($product) {
            $query->select('size_id')->from('product_sizes')->where('product_id', $product->id);
        })->latest()->get();

        return view("dashboard.productsizes.create", [
            'product' => $product,
            'sizes' => $sizesWithoutSizeInProduct,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'size' => ["required"],
            'quantity' => ["required", "integer"],
        ]);

        ProductSize::create([
            'product_id' => $request->product_id,
            'size_id' => $request->size,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('dashboard.products.index')->with('success', 'Product Size added successfully!');
    }

    public function edit(ProductSize $productsize)
    {
        $sizesWithoutSizeInProduct = Size::whereNotIn('id', function ($query) use ($productsize) {
            $query->select('size_id')->from('product_sizes')->where('product_id', $productsize->product_id);
        })->latest()->get();

        return view("dashboard.productsizes.edit", [
            'productsize' => $productsize,
            'sizes' => $sizesWithoutSizeInProduct,
        ]);
    }

    public function update(Request $request, ProductSize $productsize)
    {
        $request->validate([
            'size' => ["required"],
            'quantity' => ["required", "integer"],
        ]);

        $productsize->update([
            'size_id' => $request->size,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('dashboard.products.index')->with('success', 'Product Size updated successfully!');
    }

    public function destroy(ProductSize $productsize)
    {
        $productsize->delete();

        return redirect()->route('dashboard.products.index')->with('success', 'Product Size removed successfully!');
    }
}
