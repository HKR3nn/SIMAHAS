<?php

namespace App\Http\Controllers;

use App\Models\Kehadiran;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function index()
    {
        $kehadirans = Kehadiran::with(['mahasiswa','mataKuliah'])->get();
        return view('kehadiran.index', compact('kehadirans'));
    }

    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        $matkuls = MataKuliah::all();
        return view('kehadiran.create', compact('mahasiswas','matkuls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mahasiswa_id'   => 'required|exists:mahasiswas,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'tanggal'        => 'required|date',
            'status'         => 'required|in:Hadir,Izin,Sakit,Alpha',
        ]);

        Kehadiran::create([
            'mahasiswa_id'   => $request->mahasiswa_id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'tanggal'        => $request->tanggal,
            'status'         => $request->status,
        ]);

        return redirect()->route('kehadiran.index')
            ->with('success','Data kehadiran ditambahkan');
    }

    public function edit(Kehadiran $kehadiran)
    {
        $mahasiswas = Mahasiswa::all();
        $matkuls = MataKuliah::all();
        return view('kehadiran.edit', compact('kehadiran','mahasiswas','matkuls'));
    }

    public function update(Request $request, Kehadiran $kehadiran)
    {
        $request->validate([
            'mahasiswa_id'   => 'required|exists:mahasiswas,id',
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'tanggal'        => 'required|date',
            'status'         => 'required|in:Hadir,Izin,Sakit,Alpha',
        ]);

        $kehadiran->update([
            'mahasiswa_id'   => $request->mahasiswa_id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'tanggal'        => $request->tanggal,
            'status'         => $request->status,
        ]);

        return redirect()->route('kehadiran.index')
            ->with('success','Data kehadiran diupdate');
    }

    public function destroy(Kehadiran $kehadiran)
    {
        $kehadiran->delete();
        return redirect()->route('kehadiran.index')
            ->with('success','Data kehadiran dihapus');
    }

    public function dashboard()
    {
        $data = Kehadiran::selectRaw('status, COUNT(*) as total')
            ->groupBy('status')
            ->pluck('total','status');

        return view('dashboard', compact('data'));
    }
}
