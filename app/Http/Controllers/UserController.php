<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users with their roles
        $users = User::with('roles')->get();

        return view('users.index', compact('users'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required'
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign the selected role to the user
        $user->assignRole($request->role);

        // Redirect with success message
        return redirect()->back()->with('success', 'User created and role assigned successfully!');
    }

    public function edit($id)
    {
        // Fetch the user to edit
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed', // Password is optional
            'role' => 'required'
        ]);

        // Find the user
        $user = User::findOrFail($id);

        // Update user information
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password only if it's provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Save the user
        $user->save();

        // Sync the user's roles
        $user->syncRoles($request->role);

        // Redirect with success message
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }
}
