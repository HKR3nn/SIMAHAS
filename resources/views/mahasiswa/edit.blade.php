@extends('layouts.app')

@section('content')
<h3>Edit Mahasiswa</h3>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<form method="POST" action="{{ route('mahasiswa.update',$mahasiswa->id) }}">
@csrf @method('PUT')

<div class="mb-3">
<label>NIM</label>
<input type="text" name="nim" value="{{ old('nim',$mahasiswa->nim) }}" class="form-control" required>
</div>

<div class="mb-3">
<label>Nama</label>
<input type="text" name="nama" value="{{ old('nama',$mahasiswa->nama) }}" class="form-control" required>
</div>

<div class="mb-3">
<label>Jurusan</label>
<input type="text" name="jurusan" value="{{ old('jurusan',$mahasiswa->jurusan) }}" class="form-control" required>
</div>

<button class="btn btn-primary">Update</button>
<a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
