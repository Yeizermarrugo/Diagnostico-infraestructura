<?php

use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inscripcion');
});
Route::post('/inscripcion', [InscripcionController::class, 'store'])->name('inscripcion.store');
Route::get('/inscripciones/search', [InscripcionController::class, 'search'])->name('inscripciones.search');
Route::get('/inscripcion-total', [InscripcionController::class, 'total'])->name('inscripciones.total');
Route::get('/inscripciones/check-documento', [InscripcionController::class, 'checkDocumento'])->name('inscripciones.check-documento');
Route::get('/registro-pendiente', function () {
    return view('auth.pending-activation');
})->name('registro.pendiente');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [InscripcionController::class, 'index'])->name('dashboard');
    Route::get('/inscripciones/{inscripcion}/certificado', [InscripcionController::class, 'descargarCertificado'])->name('inscripciones.certificado');
    Route::get('/inscripciones/chart-data', [InscripcionController::class, 'chartData'])->name('inscripciones.chart-data');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/inscripciones/export/excel', [InscripcionController::class, 'exportExcel'])->name('inscripciones.export.excel');

require __DIR__ . '/auth.php';
