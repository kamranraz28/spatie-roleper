<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use App\Http\Requests\StoreUserRequest;


class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        $users= $this->userService->getAllUsers();

        return view('users.index', ['users'=>$users]);
    }

    public function dashboard()
    {
        $userTotal = User::count();
        return view('dashboard',compact('userTotal'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $this->userService->storeUser($request);

        return redirect()->back()->with('success', 'User created and role assigned successfully!');
    }


    public function edit($id)
    {
        $data = $this->userService->editUser($id);
        return view('users.edit', $data);
    }

    public function update(UpdateUserRequest $request, $id)
    {
       
        $this->userService->updateUser($request, $id);
        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }


    public function viewProfile()
    {
        // Call the service to get the user's profile
        $data = $this->userService->getUserProfile();

        return view('users.profile', $data); // Pass data to the view
    }


    public function updateProfile(UpdateUserProfileRequest $request)
    {
        $this->userService->updateUserProfile($request);
        return redirect()->route('users.dashboard')->with('success', 'Profile updated successfully!');
    }

    public function destroy($id)
    {
        $this->userService->deleteUser($id);
        return redirect()->route('users.index')->with('success', 'User Deleted successfully!');
    }

    public function clearAll()
    {
        Notification::query()->update(['notifiable_id' => 1]);

        return redirect()->back()->with('success', 'All notifications have been marked as read.');
    }






}
