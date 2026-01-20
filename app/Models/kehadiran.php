<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;

class Kehadiran extends Model
{
    protected $fillable = [
        'mahasiswa_id',
        'mata_kuliah_id',
        'tanggal',
        'status'
    ];

    // Relasi ke Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    // Relasi ke Mata Kuliah (FIX TOTAL)
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }
}
