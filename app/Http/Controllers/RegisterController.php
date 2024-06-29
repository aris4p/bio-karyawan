<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(){
        return view('register');
    }

    public function register_proses(Request $request){
        $validate = $request->validate([
            'email' => 'required|email|max:255|unique:employees',
            'password' => 'required|string|min:6',
        ]);

        $data = [
            'email' => $request->email,
            'password' => bcrypt($request->email)
        ];

        $employee = Employee::create($data);
        return redirect()->back()->with('success', 'Registrasi Berhasil');
    }
}
