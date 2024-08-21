<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function register(){
        return view('auth.register');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Welcome to dashboard');
        }

        return redirect()->back()->with('failed', 'Error logged in');
    }

    public function regist(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::create($validatedData);
        return redirect('/login')->with('success', 'Account Created Successfuly');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
