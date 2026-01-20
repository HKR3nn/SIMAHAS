@extends('layouts.app')

@section('content')
<h4>Edit Kehadiran</h4>

<form method="POST" action="{{ route('kehadiran.update', $kehadiran->id) }}">
@csrf
@method('PUT')

<div class="mb-3">
 <label>Mahasiswa</label>
 <select name="mahasiswa_id" class="form-control" required>
  @foreach($mahasiswas as $m)
   <option value="{{ $m->id }}" {{ $kehadiran->mahasiswa_id == $m->id ? 'selected' : '' }}>
    {{ $m->nama }}
   </option>
  @endforeach
 </select>
</div>

<div class="mb-3">
 <label>Mata Kuliah</label>
 <select name="mata_kuliah_id" class="form-control" required>
  <option value="">-- Pilih Mata Kuliah --</option>
  @foreach($matkuls as $mk)
   <option value="{{ $mk->id }}" {{ $kehadiran->mata_kuliah_id == $mk->id ? 'selected' : '' }}>
    {{ $mk->nama_mk }}
   </option>
  @endforeach
 </select>
</div>

<div class="mb-3">
 <label>Tanggal</label>
 <input type="date" name="tanggal" value="{{ $kehadiran->tanggal }}" class="form-control" required>
</div>

<div class="mb-3">
 <label>Status</label>
 <select name="status" class="form-control" required>
  @foreach(['Hadir','Izin','Sakit','Alpha'] as $s)
   <option value="{{ $s }}" {{ $kehadiran->status == $s ? 'selected' : '' }}>
    {{ $s }}
   </option>
  @endforeach
 </select>
</div>

<button class="btn btn-primary">Update</button>
<a href="{{ route('kehadiran.index') }}" class="btn btn-secondary">Kembali</a>

</form>
@endsection
