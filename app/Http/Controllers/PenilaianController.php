<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\kriteria;
use App\Models\penilaian;
use App\Models\rangking;
use App\Models\totalnilai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianController extends Controller
{
    public function index()
    {
        $data = penilaian::all();
        return view('penilaian.hasilpenilaianpage', compact('data'));
    }

    public function create()
    {
        $data = penilaian::all();
        $kriterias = kriteria::all();

        $userId = auth()->user()->id;
        $posisiPengguna = User::find($userId)->karyawan->id_posisi;
        $karyawans = Karyawan::where('id_posisi', $posisiPengguna)->get();

        return view('penilaian.formpenilaian', compact('data', 'karyawans', 'kriterias'));
    }

    public function showForm($id)
    {
        $userId = auth()->user()->id;

        $existingPenilaian = penilaian::where('id_karyawan', $id)
            ->where('id_penilai', $userId)
            ->exists();

        if ($existingPenilaian) {
            return redirect()->route('dashboardreal')->with('error', 'Anda telah menilai karyawan ini sebelumnya.');
        }

        $penilaian = Penilaian::all();
        $kriterias = Kriteria::all();
        $karyawan = Karyawan::find($id);

        return view('penilaian.formnyoba', compact('penilaian', 'kriterias', 'karyawan'));
    }


    public function store(Request $request)
    {
        $idKaryawan = $request->input('id_karyawan');
        $idPenilai = auth()->user()->id;

        $totalSkor = 0;

        foreach ($request->input('penilaian') as $kriteriaId => $nilai) {
            $kriteria = Kriteria::find($kriteriaId);
            $bobot = $kriteria->weight;
            $skor = floatval($nilai) * floatval(str_replace(',', '.', $bobot));

            Penilaian::create([
                'id_karyawan' => $idKaryawan,
                'id_penilai' => $idPenilai,
                'id_krkiteria' => $kriteriaId,
                'skor' => $skor,
            ]);

            $totalSkor += $skor;
        }

        totalnilai::create([
            'id_karyawan' => $idKaryawan,
            'total_nilai' => $totalSkor,
        ]);

        return redirect()->route('dashboardreal')->with('success', 'Penilaian berhasil disimpan.');
    }

    public function insertdata(Request $request)
    {
        penilaian::create($request->all());
        return redirect()->route('hasilpenilaian')->with('success', 'Data berhasil ditambahkan');
    }

    public function getMinimumScores($userId)
    {
        $totalScores = penilaian::join('karyawans', 'penilaians.id_karyawan', '=', 'karyawans.id')
            ->where('karyawans.id_user', $userId)
            ->select('id_karyawan', 'id_krkiteria', DB::raw('SUM(skor) as total_skor'))
            ->groupBy('id_karyawan', 'id_krkiteria')
            ->get();

        $minimumScores = [];
        foreach ($totalScores as $totalScore) {
            $karyawanId = $totalScore->id_karyawan;

            if (!isset($minimumScores[$karyawanId]) || $totalScore->total_skor < $minimumScores[$karyawanId]['total_skor']) {
                $minimumScores[$karyawanId] = [
                    'id_krkiteria' => $totalScore->id_krkiteria,
                    'total_skor' => $totalScore->total_skor,
                ];
            }
        }

        return $minimumScores;
    }

    public function showMinimumScores()
    {
        $userId = auth()->user()->id;
        $minimumScores = $this->getMinimumScores($userId);

        foreach ($minimumScores as $karyawanId => &$minScore) {
            $penilaian = Penilaian::where('id_karyawan', $karyawanId)
                ->where('id_krkiteria', $minScore['id_krkiteria'])
                ->first();

            $ranking = rangking::where('id_karyawan', $karyawanId)
                ->first();

            if ($penilaian && $ranking) {
                $minScore['karyawan_name'] = $penilaian->karyawan->name;
                $minScore['kriteria_name'] = $penilaian->kriteria->kriterianame;
                $minScore['total_nilai'] = $ranking->total_nilai;
                $minScore['ranking'] = $ranking->ranking;
            }
        }

        return view('employee.hasil', compact('minimumScores'));
    }

}
