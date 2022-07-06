<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\TodosController;

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

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/pengumuman/edit', [PengumumanController::class, 'edit']);
Route::put('/pengumuman/edit', [PengumumanController::class, 'update']);
Route::get('/pengumuman', [PengumumanController::class, 'index']);
Route::get('/pen', [PengumumanController::class, 'pengumuman']);
Route::get('/pengumuman/add', [PengumumanController::class, 'create']);
Route::post('/pengumuman/add', [PengumumanController::class, 'store']);
Route::get('/pengumuman', [PengumumanController::class, 'show']);
Route::delete('/pengumuman', [PengumumanController::class, 'destroy']);
// Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('todo', 'TodosController');

// Route::get('/dashboard', 'DashboardController@index') -> name ('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/todo', [TodosController::class, 'index'])->name('todo');
Route::get('/todo/create', [TodosController::class, 'create']);
Route::post('/todo/create', [TodosController::class, 'store']);

Route::get('admin/createKaryawan', [KaryawanController::class, 'create'])->name('admin.create');
Route::post('admin/createKaryawan/execute', [KaryawanController::class, 'store'])->name('admin.create.execute');

Route::get('home/pegawai', [KaryawanController::class, 'index'])->middleware(['auth'])->name('pegawai');
Route::get('home/pegawai/{karyawan:id}/status', [KaryawanController::class, 'show'])->middleware(['auth'])->name('detailPegawai');

require __DIR__.'/auth.php';
Route::get('/',[PengumumanController::class, 'index'])->name('pengumuman');
Route::get('/pengumuman/create',[PengumumanController::class,'create']);
Route::post('/pengumuman/create/execute',[PengumumanController::class,'store'])->name('addNewItem');
Route::get('/pengumuman/{id}',[PengumumanController::class,'show']);
Route::get('/pengumuman/{id}/edit',[PengumumanController::class,'edit']);
Route::put('/pengumuman/{id}',[PengumumanController::class,'update']);
Route::get('/pengumuman/{pengumuman:id}/delete',[PengumumanController::class,'destroy'])->name('delete');
