<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function userLogin(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Authenticate the user
            Auth::login($user);

            return redirect()->route('users.dashboard'); // Redirect to the dashboard
        } else {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
        }
    }

    public function userLogout(Request $request)
    {
        Auth::logout(); // Log out the user

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect(''); // Redirect to login page
    }

}
