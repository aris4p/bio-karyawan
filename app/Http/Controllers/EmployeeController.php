<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(){
        return view('pages.profile',[
            'title' => "Informasi Pribadi"
        ]);
    }

    public function store(Request $request){
        dd($request->all());

        $validate = $request->validate([
            'posisi' => 'required',
            'nama' => 'required',
            // 'gender' => 'required',
            // 'noktp' => 'required',
            // 'tgllahir' => 'required',
        ]);

        $employee = Employee::where('email', $request->email)->first();
        if($employee){
            $employee->posisi = $request->posisi;
            $employee->nama = $request->nama;
            $employee->nama = $request->nama;
            $employee->nama = $request->nama;
            $employee->nama = $request->nama;
            $employee->nama = $request->nama;
            $employee->nama = $request->nama;
            $employee->save();
            return response()->json(['message' => 'Data berhasil disimpan'], 200);
        }else{
            return response()->json(['error' => 'Data berhasil disimpan'], 400);
        }



    }
}
