<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PresentController;


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

Route::get('/', function() {
    return redirect()->route('dashboard');
});

// Route::get('/dashboard', [DashboardController::class, 'index']);
require __DIR__.'/auth.php';

Route::group(['middleware' => ['web', 'auth']], function(){

    Route::group(['middleware' => ['role:admin']], function(){
        // admin route
        Route::get('/admin/createKaryawan', [KaryawanController::class, 'create'])->name('admin.create');
        Route::post('/admin/createKaryawan/execute', [KaryawanController::class, 'store'])->name('admin.create.execute');

        // absen route
        Route::get('/dashboard/absen', [PresentController::class, 'indexForAbsen'])->name('absen.kehadiran');
        Route::get('/dashboard/absen/rekap-absen', [PresentController::class, 'index'])->name('kehadiran.index');
        Route::get('/dashboard/absen/cari', [PresentController::class, 'search'])->name('kehadiran.search');
        Route::get('/dashboard/absen/{user}/cari', 'PresentsController@cari')->name('kehadiran.cari');
        Route::get('/dashboard/absen/excel-users', [PresentController::class, 'excelUsers'])->name('kehadiran.excel-users');
        Route::get('/dashboard/absen/{user}/excel-user', 'PresentsController@excelUser')->name('kehadiran.excel-user');
        Route::post('/dashboard/absen/ubah', 'PresentsController@ubah')->name('ajax.get.kehadiran');
        Route::patch('/dashboard/absen/{kehadiran}', 'PresentsController@update')->name('kehadiran.update');
        Route::post('/dashboard/absen', 'PresentsController@store')->name('kehadiran.store');
    });
    Route::group(['middleware' => ['role:admin|user']], function(){

        Route::get('/dashboard', function(){
            return view('dashboard');
        })->name('dashboard');

        // absen checkin/out route
        Route::patch('/dashboard/absen/{kehadiran}', [PresentController::class, 'checkOut'])->name('kehadiran.check-out');
        Route::post('/dashboard/absen', [PresentController::class, 'checkIn'])->name('kehadiran.check-in');


        // pegawai route
        Route::get('/dashboard/pegawai', [KaryawanController::class, 'index'])->middleware(['auth'])->name('pegawai');
        Route::get('/dashboard/pegawai/{karyawan:user_id}/status', [KaryawanController::class, 'show'])->middleware(['auth'])->name('detailPegawai');
        // todo route
        Route::get('/test/todo/create', [TodoController::class, 'create'])->name('todo.create');
        Route::post('/test/todo/destory/bulk',[TodoController::class,'bulkDestroy'])->name('todo.destroy.bulk');
        Route::post('/test/todo/edit/bulk',[TodoController::class,'bulkEdit'])->name('todo.edit.bulk');
        Route::put('/test/todo/edit/bulk',[TodoController::class,'bulkUpdate'])->name('todo.edit.bulk.submit');
        Route::resource('/test/todo',TodoController::class);


        // pengumuman route
        Route::get('/pengumuman',[PengumumanController::class, 'index'])->name('pengumuman');
        Route::get('/pengumuman/create',[PengumumanController::class,'create']);
        Route::post('/pengumuman/create/execute',[PengumumanController::class,'store'])->name('addNewItem');
        Route::get('/pengumuman/{id}',[PengumumanController::class,'show']);
        Route::get('/pengumuman/{id}/edit',[PengumumanController::class,'edit']);
        Route::put('/pengumuman/{id}',[PengumumanController::class,'update']);
        Route::get('/pengumuman/{pengumuman:id}/delete',[PengumumanController::class,'destroy'])->name('delete');
    });
});
