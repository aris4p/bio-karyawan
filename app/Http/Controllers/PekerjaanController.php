<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PekerjaanController extends Controller
{
    //pekerjaan
    public function pekerjaan(){
        $pekerjaan = Pekerjaan::where('employee_id', Auth::user()->id)->get();
        return view('pages.pekerjaan',[
            'title' => "Pekerjaan"
        ],compact('pekerjaan'));
    }
    public function pekerjaan_e(){
        return view('pages.pekerjaan_e',[
            'title' => "Pekerjaan Tambah"
        ]);
    }

    public function pekerjaan_store(Request $request){
        $employee = Employee::where('email', Auth::user()->email)->first();

        if($employee) {
            $pekerjaan = new Pekerjaan();
            $pekerjaan->employee_id = $employee->id;
            $pekerjaan->nama_perusahaan = $request->namaperusahaan;
            $pekerjaan->posisi_terakhir = $request->posisiterakhir;
            $pekerjaan->pendapatan_terakhir = $request->pendapatanterakhir;
            $pekerjaan->tahun = $request->tahun;
            $pekerjaan->save();
            return redirect()->back()->with('success', 'Berhasil Update Data');
        }else{
            return redirect()->back()->with('error', 'Gagal Update Data: Employee tidak ditemukan');
        }
    }

    public function pekerjaan_edit($id){
        $pekerjaan = Pekerjaan::find($id);

        return view('pages.pekerjaan_edit',[
            'title' => "Pekerjaan Edit"
        ], compact('pekerjaan'));
    }

    public function pekerjaan_edit_update(Request $request, $id){
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->nama_perusahaan = $request->namaperusahaan;
        $pekerjaan->posisi_terakhir = $request->posisiterakhir;
        $pekerjaan->pendapatan_terakhir = $request->pendapatanterakhir;
        $pekerjaan->tahun = $request->tahun;
        $pekerjaan->save();
        return redirect()->back()->with('success', 'Berhasil Update Data');
    }

    public function pekerjaan_hapus($id)
    {

        $user = Pekerjaan::findOrFail($id);

        $user->delete();

        return redirect()->route('pekerjaan')->with('success', 'Pekerjaan Berhasil di delete.');
    }
}
