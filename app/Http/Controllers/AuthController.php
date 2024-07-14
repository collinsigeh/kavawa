<?php

namespace App\Http\Controllers;

use App\Models\UserPasswordResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        if(Auth::user()->is_admin)
        {
            return view('dashboard.admin');
        }
        return view('dashboard.user');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return to_route('login');
    }

    public function forgotPassword()
    {
        return view('auth.forgot_password');
    }

    public function resetPassword($token)
    {
        if(UserPasswordResetToken::where('token', $token)->count() < 1)
        {
            return to_route('login')->with('error_message', 'Password reset link has expired.');
        }

        return view('auth.reset_password', [
            'token' => $token
        ]);
    }
}
