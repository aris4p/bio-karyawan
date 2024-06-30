<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelatihanController extends Controller
{
    public function index(){

        $pelatihan = Pelatihan::where('employee_id', Auth::user()->id)->get();
        return view('pages.pelatihan',[
            'title' => "Pelatihan"
        ], compact('pelatihan'));
    }

    public function pelatihan_e(){
        return view('pages.pelatihan_e',[
            'title' => "Pelatihan"
        ]);
    }



    public function pelatihan_store(Request $request){
        $employee = Employee::where('email', Auth::user()->email)->first();

        if($employee) {
            $pelatihan = new Pelatihan();
            $pelatihan->employee_id = $employee->id;
            $pelatihan->nama_pelatihan = $request->namapelatihan;
            $pelatihan->sertifikat = $request->sertifikat;
            $pelatihan->tahun = $request->tahun;
            $pelatihan->save();
            return redirect()->back()->with('success', 'Berhasil Update Data');
        }else{
            return redirect()->back()->with('error', 'Gagal Update Data: Employee tidak ditemukan');
        }
    }


    public function pelatihan_edit($id){
        $pelatihan = Pelatihan::find($id);

        return view('pages.pelatihan_edit',[
            'title' => "Pelatihan Edit"
        ], compact('pelatihan'));
    }

    public function pelatihan_update(Request $request, $id){
        $pelatihan = Pelatihan::find($id);
        $pelatihan->nama_pelatihan = $request->namapelatihan;
        $pelatihan->sertifikat = $request->sertifikat;
        $pelatihan->tahun = $request->tahun;
        $pelatihan->save();
        return redirect()->back()->with('success', 'Berhasil Update Data');
    }


    public function pelatihan_destroy($id)
    {

        $user = Pelatihan::findOrFail($id);

        $user->delete();

        return redirect()->route('pelatihan')->with('success', 'Pelatihan Berhasil di delete.');
    }
}

