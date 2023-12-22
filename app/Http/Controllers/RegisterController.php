<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view("register.create");
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            "name" => ["required", "min:2", "max:255"],
            "email" => ["required", "min:2", "max:255", "email", Rule::unique("users", "email")],
            "password" => ["required", "min:8", "max:255"],
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        session()->flash("success", "Account created successfully!");

        return redirect("/");
    }
}
