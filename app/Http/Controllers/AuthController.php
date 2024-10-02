<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' =>'required|string|max:100',
            'email' =>'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['token' => $token]);
    }
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        $remember = !empty($request->rememberMe) ? true : false;

        if(Auth::attempt($credentials, $remember)) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Please enter current email or password');
        }
    }

    public function loginForm() {
        if (!empty(Auth::check())) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function registerForm() {
        if (!empty(Auth::check())) {
            return redirect()->back();
        }
        return view('auth.register');
    }

    public function forgotPasswordForm() {
        if (!empty(Auth::check())) {
            return redirect()->back();
        }
        return view('auth.forgot-password');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('login');
    
    }
}
