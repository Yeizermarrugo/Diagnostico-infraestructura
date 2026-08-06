<?php

use App\Http\Controllers\PostulacionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('postulacion');
})->name('postulacion.form');

Route::post('/postulacion', [PostulacionController::class, 'store'])->name('postulacion.store');
Route::get('/postulaciones/check-documento', [PostulacionController::class, 'checkDocumento'])->name('postulaciones.check-documento');

Route::get('/registro-pendiente', function () {
    return view('auth.pending-activation');
})->name('registro.pendiente');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [PostulacionController::class, 'index'])->name('dashboard');
    Route::get('/postulaciones/chart-data', [PostulacionController::class, 'chartData'])->name('postulaciones.chart-data');
    Route::get('/postulaciones/search', [PostulacionController::class, 'search'])->name('postulaciones.search');
    Route::get('/postulaciones/export/excel', [PostulacionController::class, 'exportExcel'])->name('postulaciones.export.excel');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
