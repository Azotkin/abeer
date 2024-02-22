<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function showLoginForm()
    {
        return view('dashboard');
    }

    public function getRegisterForm()
    {
        return view('dashboard');
    }

    public function login()
    {
        return view('loginForm');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function registerProcess(Request $request)
    {

        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"],
            "password_confirmation" => ["required"]
        ]);
        $model = new User();
        $model->name = 'Admin';
        $model->email = $request->input('email');
        $model->password = bcrypt($request->input('password'));
        $model->save();
        return redirect('/');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('adminPanel');
        }

        return back()->withErrors([
            'email' => 'Пользователь не найден',
        ]);
    }
}
