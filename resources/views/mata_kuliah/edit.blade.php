@extends('layouts.app')
@section('title','Edit Mata Kuliah')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Edit Mata Kuliah</h4>
    <a href="{{ route('mata-kuliah.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>

{{-- CARD TENGAH --}}
<div class="d-flex justify-content-center">
    <div class="card shadow-sm" style="width:100%; max-width:700px;">
        <div class="card-body">

            <form method="POST" action="{{ route('mata-kuliah.update', $mataKuliah->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Kode MK</label>
                    <input type="text"
                           name="kode_mk"
                           value="{{ old('kode_mk', $mataKuliah->kode_mk) }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama MK</label>
                    <input type="text"
                           name="nama_mk"
                           value="{{ old('nama_mk', $mataKuliah->nama_mk) }}"
                           class="form-control"
                           required>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('mata-kuliah.index') }}" class="btn btn-light">Batal</a>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
