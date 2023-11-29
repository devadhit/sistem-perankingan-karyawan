<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\penilaian;
use App\Models\posisi;
use App\Models\rangking;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function dashboard() {
        $jumlahPenilai = penilaian::distinct('id_penilai')->count();

        $bestEmployee = rangking::select('id_karyawan', 'total_nilai')
        ->orderByDesc('total_nilai')
        ->first();

        if ($bestEmployee) {
            $idKaryawan = $bestEmployee->id_karyawan;
            $karyawan = karyawan::find($idKaryawan);

            $namaBulanSaatIni = Carbon::now()->format('F');

            $namaKaryawanTerbaik = $karyawan->name;
        } else {
            $namaBulanSaatIni = "Bulan Tidak Tersedia";
            $namaKaryawanTerbaik = "";
        }

        return view('dashboard', compact('jumlahPenilai', 'namaKaryawanTerbaik', 'namaBulanSaatIni'));
    }

    public function index()
    {
        $userId = auth()->user()->id;
        $karyawan = User::find($userId)->karyawan;

        if ($karyawan) {
            $posisiPengguna = $karyawan->id_posisi;
            $namaPosisi = posisi::find($posisiPengguna)->nameposition;

            $karyawans = karyawan::where('id_posisi', $posisiPengguna)
                ->where('id_user', '!=', $userId)
                ->get();

            return view('dashboardemp', compact('userId', 'namaPosisi', 'karyawans'));
        }

        return view('dashboardemp')->with('error', 'Data karyawan tidak ditemukan.');
    }


    public function dashboardemp() {
        return view('dashboardemp');
    }

    public function loginproses(Request $request) {
        if(Auth::attempt($request->only('email','password'))) {
            return redirect('/dashboardadmin');
        }

    // return redirect('login');
    }

    public function register() {
        return view('auth.register');
    }

    public function registeruser(Request $request) {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
            'role' => 'employee',
        ]);

        return redirect('/login');
    }

    public function logout() {
        Auth::logout();
        return \redirect('login');
    }
}
