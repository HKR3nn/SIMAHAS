<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\KehadiranController;

Route::get('/', fn()=>redirect('/dashboard'));

Route::get('/dashboard',[KehadiranController::class,'dashboard'])->name('dashboard');

Route::resource('mahasiswa',MahasiswaController::class);
Route::resource('mata-kuliah',MataKuliahController::class);
Route::resource('kehadiran',KehadiranController::class);

