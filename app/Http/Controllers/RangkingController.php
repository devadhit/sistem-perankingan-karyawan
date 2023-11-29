<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\penilaian;
use App\Models\rangking;
use App\Models\totalnilai;
use Illuminate\Http\Request;

class RangkingController extends Controller
{
    public function index()
    {
        $data = rangking::all();
        return view('penilaian.hasilpenilaianpage',compact('data'));
    }

    public function generateRanking()
    {
        $karyawanTotalSkor = totalnilai::selectRaw('id_karyawan, AVG(total_nilai) as total_skor')
            ->groupBy('id_karyawan')
            ->get();

        $sortedRanking = $karyawanTotalSkor->sortByDesc('total_skor');

        $rangking = 1;
        foreach ($sortedRanking as $item) {
            $karyawan = karyawan::find($item->id_karyawan);

            rangking::updateOrInsert(
                ['id_karyawan' => $item->id_karyawan],
                ['total_nilai' => $item->total_skor, 'ranking' => $rangking]
            );

            $rangking++;
        }

        return redirect()->route('ranking')->with('success', 'Peringkat berhasil di-generate.');
    }


}
