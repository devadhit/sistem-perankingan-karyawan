<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\penilaian;
use App\Models\posisi;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        $data = karyawan::all();
        return view('employee.employeepage',compact('data'));
    }

    public function create() {
        $usersWithoutKaryawan = User::doesntHave('karyawan')->where('role', 'employee')->get();

        $data = karyawan::all();
        $posisi = posisi::all();

        return view('employee.createemployee', compact('data', 'posisi', 'usersWithoutKaryawan'));
    }

    public function insertdata(Request $request) {
        karyawan::create($request->all());
        return redirect()->route('employee')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id) {
        $data = karyawan::find($id);
        $posisi = posisi::all();
        $user = User::all();
        return view('employee.show', compact('data','posisi','user'));
    }

    public function update(Request $request, $id) {
        $data = karyawan::find($id);
        $data->update($request->all());
        return redirect()->route('employee')->with('success', 'Data berhasil diubah');
    }

    public function delete($id) {
        penilaian::where('id_karyawan', $id)->delete();

        $data = karyawan::find($id);
        $data->delete();
        return redirect()->route('employee')->with('success', 'Data berhasil dihapus');
    }


}
