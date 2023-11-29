<?php

namespace App\Http\Controllers;
use App\Models\kriteria;

use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index() {
        $data = kriteria::all();
        return view('criteria.criteriapage',compact('data'));
    }

    public function create() {
        return view('criteria.createcriteria');
    }

    public function insertdata(Request $request) {
        $kriteria = new kriteria();
        $kriteria->kriterianame=$request->kriterianame;
        $kriteria->weight=$request->weight;
        $kriteria->save();
        return redirect()->route('criteria')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id) {
        $data = kriteria::find($id);
        return view('criteria.show', compact('data'));
    }

    public function update(Request $request, $id) {
        $kriteria = kriteria::find($id);
        $kriteria->kriterianame=$request->kriterianame;
        $kriteria->weight=$request->weight;
        $kriteria->update();
        return redirect()->route('criteria')->with('success', 'Data berhasil diubah');
    }

    public function delete($id) {
        $data = kriteria::find($id);
        $data->delete();
        return redirect()->route('criteria')->with('success', 'Data berhasil dihapus');
    }
}
