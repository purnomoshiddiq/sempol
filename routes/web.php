<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnggotaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/data-buku', [AdminController::class, 'index']);
Route::post('/data-buku/store', [AdminController::class, 'store']);
Route::post('/data-buku/{id}/edit', [AdminController::class, 'edit']);
Route::get('/data-buku/{id}/delete', [AdminController::class, 'delete']);
Route::get('/data-anggota', [AdminController::class, 'anggota']);
Route::post('/data-anggota/import', [AnggotaController::class, 'import']);
Route::get('/data-anggota/{id}/edit', [AdminController::class, 'edit']);
Route::get('/data-anggota/{id}/delete', [AdminController::class, 'delete']);
Route::get('/data-peminjaman', [AdminController::class, 'pinjaman']);
