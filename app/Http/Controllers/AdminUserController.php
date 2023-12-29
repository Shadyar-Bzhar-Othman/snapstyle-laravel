<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view("dashboard.users.index", [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view("dashboard.users.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ["required", "min:2", "max:255"],
            'email' => ["required", "email", Rule::unique("users", "email")],
            'password' => ["required", "min:8", "max:255"],
            'role' => ["required"],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect()->route('dashboard.users.index')->with('success', 'User added successfully!');
    }

    public function edit(User $user)
    {
        return view("dashboard.users.edit", [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ["required", "min:2", "max:255"],
            'email' => ["required", "email", Rule::unique("users", "email")->ignore($user->id)],
            'password' => ["required", "min:8", "max:255"],
            'role' => ["required"],
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,
        ]);

        return redirect()->route('dashboard.users.index')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard.users.index')->with('success', 'User removed successfully!');
    }
}
