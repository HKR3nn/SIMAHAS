<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        // ambil keyword search
        $q = $request->q;

        // query + search + pagination
        $mahasiswa = Mahasiswa::when($q, function ($query) use ($q) {
            $query->where('nim', 'like', "%{$q}%")
                  ->orWhere('nama', 'like', "%{$q}%")
                  ->orWhere('jurusan', 'like', "%{$q}%");
        })
        ->orderBy('nim', 'asc')
        ->paginate(10)
        ->withQueryString();

        return view('mahasiswa.index', compact('mahasiswa', 'q'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'jurusan' => 'required'
        ]);

        Mahasiswa::create($request->all());

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required',
            'jurusan' => 'required'
        ]);

        $mahasiswa->update($request->all());

        return redirect()
            ->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil diperbarui');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return back()->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
