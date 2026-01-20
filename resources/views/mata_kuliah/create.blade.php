@extends('layouts.app')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
<script>
    Swal.fire({
        title: "Nice!",
        text: "Kamu berhasil menambah data",
        icon: "success"
    });
</script>
@endif

<form method="POST" action="{{ route('mata-kuliah.store') }}">
@csrf

<div class="mb-3">
<label>Kode MK</label>
<input type="text" name="kode_mk" class="form-control" required>
</div>

<div class="mb-3">
<label>Nama MK</label>
<input type="text" name="nama_mk" class="form-control" required>
</div>

<button class="btn btn-primary">Simpan</button>
</form>
@endsection
