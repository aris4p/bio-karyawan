<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{


    public function index(){
        return view('pages.profile',[
            'title' => "Informasi Pribadi"
        ]);
    }
    public function profile_e(){
        return view('pages.profile_e',[
            'title' => "Informasi Pribadi"
        ]);
    }

    public function profile_store(Request $request){


        $validate = $request->validate([
            'posisi' => 'required',
            'nama' => 'required',
            // 'gender' => 'required',
            // 'noktp' => 'required',
            // 'tgllahir' => 'required',
        ]);

        $employee = Employee::where('email', $request->email)->first();
        if ($employee) {
            $employee->posisi = $request->posisi;
            $employee->nama = $request->nama;
            $employee->noktp = $request->noktp;
            $employee->tempat = $request->tempat;
            $employee->tgllahir = $request->tgllahir;
            $employee->jenkel = $request->gender;
            $employee->agama = $request->agama;
            $employee->goldar = $request->goldar;
            $employee->email = $request->email;
            $employee->notelpon = $request->notelpon;
            $employee->alamat_ktp = $request->alamatktp;
            $employee->alamat_tinggal = $request->alamattinggal;
            $employee->notelpon_tdkt = $request->orgtrdkt;
            $employee->skill = $request->skill;
            $employee->persetujuan = $request->persetujuan;
            $employee->penghasilan = $request->penghasilan;
            $employee->save();

            // Mengambil atau membuat pendidikan baru
            $pendidikan = Pendidikan::firstOrNew(['employee_id' => $employee->id]);
            $pendidikan->nama_pendidikan = $request->jenjang;
            $pendidikan->institusi = $request->institusi;
            $pendidikan->jurusan = $request->jurusan;
            $pendidikan->tahun = $request->tahun;
            $pendidikan->ipk = $request->ipk;
            $pendidikan->save();

            return redirect()->back()->with('success', 'Berhasil Update Data');
        } else {
            return redirect()->back()->with('error', 'Gagal Update Data: Employee tidak ditemukan');
        }





    }




}
