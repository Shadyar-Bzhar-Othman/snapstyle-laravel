<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view("session.create");
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            "email" => ["required", "min:2", "max:255", "email"],
            "password" => ["required", "min:8", "max:255"],
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages(["email" => "We can't verify your credits"]);
        }

        return redirect()->route('home')->with("success", "Welcome Back!");
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->route('login')->with("success", "Goodbye!");
    }
}