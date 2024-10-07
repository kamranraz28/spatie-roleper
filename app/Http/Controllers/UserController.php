<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users with their roles
        $users = User::with('roles')->get();

        return view('users.index', compact('users'));
    }

    public function getNotifications()
    {
        $user = Auth::user(); // Get the authenticated user
        $notifications = $user->notifications()->latest()->limit(5)->get(); // Fetch latest notifications
        return $notifications; // Return notifications
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
        $id = Auth()->id();
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

        // Create a notification for user creation
        $notification = new Notification();
        $notification->user_id = $user->id;
        $notification->message = Auth::user()->name . " created a user- {$user->name} for role- {$request->role}";
        $notification->is_read = false;
        $notification->created_by = $id;
        $notification->save();

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


    public function viewProfie()
    {
        $userId = Auth()->id();
        
        $user = User::findOrFail($userId);
        $roles = Role::all();

        return view('users.profile', compact('user', 'roles'));
        
    }

    public function updateProfile(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Add any additional validation rules as necessary
        ]);

        $id = Auth()->id(); // Get the authenticated user's ID
        // Find the user by ID
        $user = User::findOrFail($id);

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Get the current date to append
            $currentDate = now()->format('YmdHis'); // Use a format suitable for filenames

            // Create a new filename in the format: idimagecurrentdate.extension
            $filename = "{$id}image{$currentDate}." . $request->file('image')->getClientOriginalExtension();

            // Store the image in the 'public/img' directory
            $path = $request->file('image')->storeAs('img', $filename, 'public'); // This stores in storage/app/public/img

            // Store the filename in the database (store the path for retrieval)
            $user->image = $filename; // Assuming you have an `image` column in your users table
        }

        $user->save();

        return redirect()->route('users.dashboard')->with('success', 'User updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User Deleted successfully!');

    }

    public function clearAll()
    {
        Notification::query()->update(['notifiable_id' => 1]);

        return redirect()->back()->with('success', 'All notifications have been marked as read.');
    }






}
