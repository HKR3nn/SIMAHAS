<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliah = MataKuliah::all();
        return view('mata_kuliah.index', compact('mataKuliah'));
    }

    public function create()
    {
        return view('mata_kuliah.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mata_kuliahs,kode_mk',
            'nama_mk' => 'required'
        ]);

        MataKuliah::create([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
        ]);

        return redirect()
            ->back()
            ->with('success','Mata kuliah ditambahkan');
    }

    public function edit(MataKuliah $mataKuliah)
    {
        return view('mata_kuliah.edit', compact('mataKuliah'));
    }

    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $request->validate([
            'kode_mk' => 'required|unique:mata_kuliahs,kode_mk,' . $mataKuliah->id,
            'nama_mk' => 'required'
        ]);

        $mataKuliah->update([
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
        ]);

        return redirect()
            ->route('mata-kuliah.index')
            ->with('success','Mata kuliah diupdate');
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();
        return back()->with('success','Mata kuliah dihapus');
    }
}
