@extends('layouts.app')
@section('title','Mata Kuliah')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Data Mata Kuliah</h4>
    <a href="{{ route('mata-kuliah.create') }}" class="btn btn-success">
        + Tambah Mata Kuliah
    </a>
</div>

<div class="d-flex justify-content-center">
    <div class="card shadow-sm" style="width:100%; max-width:900px;">
        <div class="card-body">

            <table class="table table-bordered align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Kode MK</th>
                        <th>Nama MK</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mataKuliah as $mk)
                    <tr>
                        <td>{{ $mk->kode_mk }}</td>
                        <td>{{ $mk->nama_mk }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('mata-kuliah.edit',$mk->id) }}"
                                   class="btn btn-warning btn-sm">Edit</a>

                                <form method="POST"
                                      action="{{ route('mata-kuliah.destroy',$mk->id) }}">
                                    @csrf @method('DELETE')
                                    <button data-confirm-delete
                                            class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
