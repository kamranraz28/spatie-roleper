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
        $roles  = Role::all();
        return view('users.create',compact('roles'));
    }
    public function store(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',  // "confirmed" ensures that password and password_confirmation match
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
}

