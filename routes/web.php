<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

// Redirect root to the karyawans route
Route::get('/', function () {
    return redirect()->route('Karyawan.index');
});

Route::get('/karyawans', [KaryawanController::class, 'index'])->name('Karyawan.index');
Route::get('/karyawans/create', [KaryawanController::class, 'create'])->name('Karyawan.create');
Route::post('/karyawans', [KaryawanController::class, 'store'])->name('Karyawan.store');
Route::get('/karyawans/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('Karyawan.edit');
Route::put('/karyawans/{karyawan}', [KaryawanController::class, 'update'])->name('Karyawan.update');
Route::delete('/karyawans/{karyawan}', [KaryawanController::class, 'destroy'])->name('Karyawan.destroy');
Route::get('/karyawans-deleted', [KaryawanController::class, 'deleted'])->name('Karyawan.deleted');

// Add new routes for restore and force delete
Route::post('/karyawans/{id}/restore', [KaryawanController::class, 'restore'])->name('Karyawan.restore');
Route::delete('/karyawans/{id}/force-delete', [KaryawanController::class, 'forceDelete'])->name('Karyawan.forceDelete');
