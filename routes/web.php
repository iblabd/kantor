<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/pengumuman/edit', [PengumumanController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard');
Route::put('/pengumuman/edit', [PengumumanController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/pengumuman', [PengumumanController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/pen', [PengumumanController::class, 'pengumuman'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/pengumuman/add', [PengumumanController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/pengumuman/add', [PengumumanController::class, 'store'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/pengumuman', [PengumumanController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');
Route::delete('/pengumuman', [PengumumanController::class, 'destroy'])->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
