<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminSizeController extends Controller
{
    public function index()
    {
        $sizes = Size::latest()->get();

        return view("dashboard.sizes.index", [
            'sizes' => $sizes,
        ]);
    }

    public function create()
    {
        return view("dashboard.sizes.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'size' => ["required", "max:255", Rule::unique("sizes", "name")],
        ]);

        Size::create([
            'name' => $request->size,
        ]);

        return redirect()->route('dashboard.sizes.index')->with('success', 'Size added successfully!');
    }

    public function edit(Size $size)
    {
        return view("dashboard.sizes.edit", [
            'size' => $size,
        ]);
    }

    public function update(Request $request, Size $size)
    {
        $request->validate([
            'size' => ["required", "max:255", Rule::unique("sizes", "name")->ignore($size->id)],
        ]);

        $size->update([
            'name' => $request->size,
        ]);

        return redirect()->route('dashboard.sizes.index')->with('success', 'Size updated successfully!');
    }

    public function destroy(Size $size)
    {
        $size->delete();

        return redirect()->route('dashboard.sizes.index')->with('success', 'Size removed successfully!');
    }
}
