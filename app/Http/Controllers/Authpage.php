<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usermodel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\table;

class Authpage extends Controller
{
    public function __construct() {}

    public function loginView()
    {
        return view('formView.login');
    }
    public function login(Request $request)
    {
        echo "<pre>";
        print_r($request);
        echo "</pre>";
        session_start();
        $credentials= $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }



    public function signup()
    {
        return view('formView.signup');
    }

    public function formsubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = Usermodel::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'remember_token' => 
        ]);
        Auth::login($user);
        return redirect()->route('index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
