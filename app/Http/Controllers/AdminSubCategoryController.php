<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Validation\Rule;

class AdminSubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();

        return view("dashboard.subcategories.index", [
            'categories' => $categories,
            'subcategories' => $subcategories,
        ]);
    }

    public function create()
    {
        $categories = Category::latest()->get();

        return view("dashboard.subcategories.create", [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => ["required"],
            'subcategory' => ["required", "min:2", "max:255", Rule::unique("sub_categories", "name")],
        ]);

        SubCategory::create([
            'category_id' => $request->category,
            'name' => $request->subcategory,
        ]);

        return redirect()->route('dashboard.subcategories.index')->with('success', 'Sub Category added successfully!');
    }

    public function edit(SubCategory $subcategory)
    {
        $categories = Category::latest()->get();

        return view("dashboard.subcategories.edit", [
            'categories' => $categories,
            'subcategory' => $subcategory,
        ]);
    }

    public function update(Request $request, SubCategory $subcategory)
    {
        $request->validate([
            'category' => ["required"],
            'subcategory' => ["required", "min:2", "max:255", Rule::unique("sub_categories", "name")->ignore($subcategory->id)],
        ]);

        $subcategory->update([
            'category_id' => $request->category,
            'name' => $request->subcategory,
        ]);

        return redirect()->route('dashboard.subcategories.index')->with('success', 'Sub Category updated successfully!');
    }

    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();

        return redirect()->route('dashboard.subcategories.index')->with('success', 'Sub Category removed successfully!');
    }
}
