<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view("website.index", ['products' => Product::limit(4)->latest()->get()]);
    }

    public function dashboard()
    {
        return view("dashboard.index");
    }
}
