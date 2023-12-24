<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view("website.index");
    }

    public function dashboard()
    {
        return view("dashboard.index");
    }

    public function about()
    {
        return view("website.about");
    }

    public function contact()
    {
        return view("website.contact");
    }
}
