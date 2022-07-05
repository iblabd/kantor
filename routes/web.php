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

Route::get('/pengumuman/edit', [PengumumanController::class, 'edit']);
Route::put('/pengumuman/edit', [PengumumanController::class, 'update']);
Route::get('/pengumuman', [PengumumanController::class, 'index']);
Route::get('/pen', [PengumumanController::class, 'pengumuman']);
Route::get('/pengumuman/add', [PengumumanController::class, 'create']);
Route::post('/pengumuman/add', [PengumumanController::class, 'store']);
Route::get('/pengumuman', [PengumumanController::class, 'show']);
Route::delete('/pengumuman', [PengumumanController::class, 'destroy']);

require __DIR__.'/auth.php';
