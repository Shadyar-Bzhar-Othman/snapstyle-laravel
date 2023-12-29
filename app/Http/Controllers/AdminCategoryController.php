<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Validation\Rule;

class AdminCategoryController extends Controller
{
    public function index()
    {
        return view("dashboard.categories.index", [
            'categories' => Category::latest()->get(),
        ]);
    }

    public function create()
    {
        return view("dashboard.categories.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => ["required", "min:2", "max:255", Rule::unique("categories", "name")],
        ]);

        Category::create([
            'name' => $request->category,
        ]);

        return redirect()->route('dashboard.categories.index')->with('success', 'Category added successfully!');
    }

    public function edit(Category $category)
    {
        return view("dashboard.categories.edit", [
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category' => ["required", "min:2", "max:255", Rule::unique("categories", "name")->ignore($category->id)],
        ]);

        $category->update([
            'name' => $request->category,
        ]);

        return redirect()->route('dashboard.categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('dashboard.categories.index')->with('success', 'Category removed successfully!');
    }
}
