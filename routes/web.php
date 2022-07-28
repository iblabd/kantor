<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
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

Route::group(['middleware' => ['web', 'auth', 'verified']], function(){

    Route::group(['middleware' => ['role:admin']], function(){
        // admin route
        Route::get('/admin/createKaryawan', [KaryawanController::class, 'create'])->name('admin.create');
        Route::post('/admin/createKaryawan/execute', [KaryawanController::class, 'store'])->name('admin.create.execute');

        // absen route
        Route::get('/dashboard/absen/rekap-absen', [PresentController::class, 'index'])->name('kehadiran.index');
        Route::get('/dashboard/absen/cari', [PresentController::class, 'search'])->name('kehadiran.search');
        Route::get('/dashboard/absen/{user}/cari', 'PresentsController@cari')->name('kehadiran.cari');
        Route::get('/dashboard/absen/excel-users', [PresentController::class, 'excelUsers'])->name('kehadiran.excel-users');
        Route::get('/dashboard/absen/{user}/excel-user', 'PresentsController@excelUser')->name('kehadiran.excel-user');
        Route::post('/dashboard/absen/ubah', 'PresentsController@ubah')->name('ajax.get.kehadiran');
        Route::patch('/dashboard/absen/{kehadiran}', 'PresentsController@update')->name('kehadiran.update');
        Route::post('/dashboard/absen', 'PresentsController@store')->name('kehadiran.store');
        Route::get('projects/create', [ProjectController::class, 'create'])->name('projects.create');
        Route::post('/projects/create', [ProjectController::class, 'store'])->name('projects.store');
        Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
        Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    });
    Route::group(['middleware' => ['role:admin|user', 'verified']], function(){

        Route::get('/dashboard', function(){
            return view('dashboard');
        })->name('dashboard');

        //projects
        Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/projects/{project}', [ProjectController::class, 'indexTodo'])->name('projects.show');
        Route::post ('projects/{project}', [ProjectController::class, 'assign'])->name('projects.assign');

        // absen checkin/out route
        Route::get('/dashboard/absen', [PresentController::class, 'indexForAbsen'])->name('absen.kehadiran');
        Route::patch('/dashboard/absen/{kehadiran}', [PresentController::class, 'checkOut'])->name('kehadiran.check-out');
        Route::post('/dashboard/absen', [PresentController::class, 'checkIn'])->name('kehadiran.check-in');

        // pegawai route
        Route::get('/dashboard/pegawai', [KaryawanController::class, 'index'])->name('pegawai');
        Route::get('/dashboard/pegawai/{karyawan:id}/status', [KaryawanController::class, 'show'])->name('detailPegawai');
        Route::get('/dashboard/userProfile/{karyawan:id}/status', [KaryawanController::class, 'userProfile'])->middleware(['auth'])->name('userProfile');
        Route::get('/dashboard/pegawai/{karyawan:user_id}/status', [KaryawanController::class, 'show'])->middleware(['auth'])->name('detailPegawai');
        Route::get('/dashboard/userProfile/{karyawan:user_id}/status', [KaryawanController::class, 'userProfile'])->middleware(['auth'])->name('userProfile');

        // todo route
        Route::get('projects/{project:id}/todo/{todo:id}/edit', [ProjectController::class, 'editTodo'])->name('todo.edit');
        Route::put('projects/{project:id}/todo/{todo:id}/edit', [ProjectController::class, 'updateTodo'])->name('todo.update');
        Route::get('/projects/{project:id}/add', [ProjectController::class, 'addTodo'])->name('todo.create');
        Route::post('/projects/{project:id}/add', [ProjectController::class, 'storeTodo'])->name('todo.store');
        Route::post('todo/destory/bulk',[ProjectController::class,'bulkDestroy'])->name('todo.destroy.bulk');
        Route::put('projects/{project:id}/', [ProjectController::class, 'updateTodoStatus'])->name('todo.markDone');

        // Pengumuman route
        Route::get('/add', function(){
            return view('add');
        });
        Route::get('/pengumuman',[PengumumanController::class, 'home'])->name('pengumuman');
        Route::post('/pengumuman/add',[PengumumanController::class,'add'])->name('add');
        Route::post('/pengumuman/add/execute',[PengumumanController::class,'store'])->name('addNewItem');
        Route::get('/pengumuman/read/{id}',[PengumumanController::class,'read']);
        Route::get('/pengumuman/edit/{id}',[PengumumanController::class,'edit'])->name('edit');
        Route::get('/pengumuman/update/{id}',[PengumumanController::class,'update']);
        Route::get('/pengumuman/delete/{id}',[PengumumanController::class,'delete'])->name('pengumuman.delete');


        //dashboard
        Route::get('/dashboard',[DashboardController::class, 'home'])->name('dashboard');
    });
});
