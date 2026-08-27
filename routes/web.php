<?php

use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('diagnostico');
})->name('diagnostico.form');

Route::post('/diagnostico', [DiagnosticoController::class, 'store'])->name('diagnostico.store');
Route::get('/diagnosticos/check-entidad', [DiagnosticoController::class, 'checkEntidad'])->name('diagnosticos.check-entidad');

Route::get('/registro-pendiente', function () {
    return view('auth.pending-activation');
})->name('registro.pendiente');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DiagnosticoController::class, 'index'])->name('dashboard');
    Route::get('/diagnosticos/chart-data', [DiagnosticoController::class, 'chartData'])->name('diagnosticos.chart-data');
    Route::get('/diagnosticos/search', [DiagnosticoController::class, 'search'])->name('diagnosticos.search');
    Route::get('/diagnosticos/export/excel', [DiagnosticoController::class, 'exportExcel'])->name('diagnosticos.export.excel');
    Route::get('/diagnosticos/{diagnostico}/archivo', [DiagnosticoController::class, 'descargarArchivo'])->name('diagnosticos.descargar-archivo');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
