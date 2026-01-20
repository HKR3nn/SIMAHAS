@extends('layouts.app')
@section('title','Mahasiswa')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Data Mahasiswa</h4>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-success">
        + Tambah Mahasiswa
    </a>
</div>

{{-- CARD TENGAH --}}
<div class="d-flex justify-content-center">
    <div class="card shadow-sm" style="width: 100%; max-width: 900px;">
        <div class="card-body">

            {{-- SEARCH --}}
            <form method="GET" class="d-flex gap-2 mb-3">
                <input type="text"
                       name="q"
                       value="{{ $q }}"
                       class="form-control"
                       placeholder="Cari NIM / Nama / Jurusan">
                <button class="btn btn-primary">Cari</button>
            </form>

            {{-- TABLE --}}
            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mahasiswa as $m)
                    <tr>
                        <td>{{ $m->nim }}</td>
                        <td>{{ $m->nama }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('mahasiswa.edit',$m->id) }}"
                                   class="btn btn-warning btn-sm">Edit</a>

                                <form method="POST"
                                      action="{{ route('mahasiswa.destroy',$m->id) }}">
                                    @csrf @method('DELETE')
                                    <button data-confirm-delete
                                            class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            Data tidak ditemukan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>

{{-- PAGINATION --}}
<div class="d-flex justify-content-center mt-3">
    {{ $mahasiswa->links() }}
</div>

@endsection
