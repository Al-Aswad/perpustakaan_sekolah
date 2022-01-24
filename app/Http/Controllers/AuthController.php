<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $credential = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credential)) {

            $request->session()->regenerate();
            $role = Auth::user()->roles;
            // dd($role);
            // return redirect()->intended('/home');
            if ($role == 'ADMIN') {
                return redirect()->intended('/home');
            } else {
                return redirect()->intended('/user');
            }
        }

        return back()->withErrors([
            // echo "sukses";
            // die;
            'Auth' => 'The provided credentials do not match our records.'
        ]);
    }

    public function keluar(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
