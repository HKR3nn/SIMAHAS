@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('kehadiran.store') }}">
@csrf

<div class="mb-3">
<label>Mahasiswa</label>
<select name="mahasiswa_id" class="form-control" required>
 <option value="">-- Pilih --</option>
 @foreach($mahasiswas as $m)
 <option value="{{ $m->id }}">{{ $m->nama }}</option>
 @endforeach
</select>
</div>

<div class="mb-3">
<label>Mata Kuliah</label>
<select name="mata_kuliah_id" class="form-control" required>
 <option value="">-- Pilih --</option>
 @foreach($matkuls as $mk)
 <option value="{{ $mk->id }}">{{ $mk->nama_mk }}</option>
 @endforeach
</select>
</div>

<div class="mb-3">
<label>Tanggal</label>
<input type="date" name="tanggal" class="form-control" required>
</div>

<div class="mb-3">
<label>Status</label>
<select name="status" class="form-control" required>
 <option>Hadir</option>
 <option>Izin</option>
 <option>Sakit</option>
 <option>Alpha</option>
</select>
</div>

<button class="btn btn-primary">Simpan</button>
</form>
@endsection
