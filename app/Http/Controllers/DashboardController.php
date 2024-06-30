<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Pekerjaan;
use App\Models\Pelatihan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index(){
        return view('pages.index',[
            'title' => "Dashboard"
        ]);
    }

    public function data(Request $request){
        if($request->ajax()){
            $data = Employee::query()
            ->where('isAdmin', '!=', '1')
            ->get();

            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $editBtn = '<a href="' . route('kandidat', $row->id) . '" class="editBtn btn btn-primary btn-sm" id="editbtn" data-id="' . $row->id . '">Show</a>';
                $deleteBtn = '<a href="' . route('kandidat-hapus', $row->id) . '" class="deleteBtn btn btn-danger btn-sm" id="btnHapusKaryawan" data-id="'.$row->id.'">Delete</a>';
                return $editBtn . ' ' . $deleteBtn;
            })
            ->addColumn('tempat_tgllahir', function($employee) {
                return $employee->tempat_tgllahir;
            })
            ->rawColumns(['action'])
            ->make(true);

        }

        return view('pages.admin.index',[
            'title' => "Daftar Kandidat"
        ]);
    }

    public function kandidat($id){
        $kandidat = Employee::findOrFail($id);

        return view('pages.admin.kandidat',[
            'title' => "Profil Kandidat"
        ],compact('kandidat'));
    }
    public function kandidat_edit($id){
        $kandidat = Employee::findOrFail($id);

        return view('pages.admin.kandidat_edit',[
            'title' => "Profil Kandidat"
        ],compact('kandidat'));
    }

    public function kandidat_hapus($id){
        $user = Employee::findOrFail($id);

        $user->delete();

        return redirect()->route('data')->with('success', 'Kandidat Berhasil di hapus.');
    }
    public function kandidat_hapus_pekerjaan(Request $request,$id){
        $user = Pekerjaan::findOrFail($id);

        $user->delete();

        return redirect()->route('kandidat', $request->id)->with('success','Pekerjaan Berhasil di hapus.');
    }
    public function kandidat_hapus_pelatihan(Request $request,$id){
        $user = Pelatihan::findOrFail($id);

        $user->delete();

        return redirect()->route('kandidat', $request->id)->with('success','Pelatihan Berhasil di hapus.');
    }
}
