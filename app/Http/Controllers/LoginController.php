<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function authenticate(Request $request){

        //validasi
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Log kredensial untuk debugging
        Log::info('Attempting login with:', $credentials);


        //check jika login berhasil
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            //mengembalikan ke halaman dashboard
            return redirect()->intended('profile');
        }
        Log::warning('Login failed for user: ', ['email' => $credentials['email']]);

        //jika gagal
        return back()->withErrors([
            'email' => 'Email atau password salah',
            ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
