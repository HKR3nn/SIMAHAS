@extends('layouts.app')
@section('title','Kehadiran')

@section('content')

{{-- HEADER --}}
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Data Kehadiran</h4>
    <a href="{{ route('kehadiran.create') }}" class="btn btn-success">
        + Tambah Kehadiran
    </a>
</div>

{{-- CARD TENGAH --}}
<div class="d-flex justify-content-center">
    <div class="card shadow-sm" style="width:100%; max-width:1000px;">
        <div class="card-body">

            {{-- NOTE:
                Kalau lu udah pakai SweetAlert global di layout, bagian alert manual ini bisa dihapus.
                Tapi gw biarin aman (nggak ganggu) --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                <script>
                    Swal.fire({
                        title: "Nice!",
                        text: "{{ session('success') }}",
                        icon: "success"
                    });
                </script>
            @endif

            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Mahasiswa</th>
                        <th>Mata Kuliah</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kehadirans as $k)
                    <tr>
                        <td>{{ optional($k->mahasiswa)->nama ?? '-' }}</td>
                        <td>{{ optional($k->mataKuliah)->nama_mk ?? '-' }}</td>
                        <td>{{ $k->tanggal }}</td>
                        <td>
                            <span class="badge bg-secondary">
                                {{ $k->status }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('kehadiran.edit',$k->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('kehadiran.destroy',$k->id) }}"
                                      method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button data-confirm-delete class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Data kehadiran belum ada
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
