<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'password' =>  Hash::make($request->password),
            'isAdmin' => '0',
        ];

        $employee = Employee::create($data);
        return redirect()->back()->with('success', 'Registrasi Berhasil');
    }
}
