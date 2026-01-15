<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FanController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\PMBController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StrukturalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth','admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/data-murid', [DashboardController::class, 'dataMurid']);
    Route::get('/dashboard/data-murid-tahun', [DashboardController::class, 'muridTahun']);
    Route::get('/dashboard/data-pengajar', [DashboardController::class, 'dataPengajar']);
    Route::get('/dashboard/data-fan', [DashboardController::class, 'dataFan']);
    // profile
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile/update/{id}', [ProfileController::class, 'update']);
    Route::post('/profile/visi-store', [ProfileController::class, 'visiStore']);
    Route::post('/profile/visi-update/{id}', [ProfileController::class, 'visiUpdate']);
    Route::get('/profile/visi-delete/{id}', [ProfileController::class, 'visiDelete']);
    Route::post('/profile/misi-store', [ProfileController::class, 'misiStore']);
    Route::post('/profile/misi-update/{id}', [ProfileController::class, 'misiUpdate']);
    Route::get('/profile/misi-delete/{id}', [ProfileController::class, 'misiDelete']);
    Route::post('/profile/tujuan-store', [ProfileController::class, 'tujuanStore']);
    Route::post('/profile/tujuan-update/{id}', [ProfileController::class, 'tujuanUpdate']);
    Route::get('/profile/tujuan-delete/{id}', [ProfileController::class, 'tujuanDelete']);
    // admin
    Route::get('/data-admin', [AdminController::class, 'index']);
    Route::get('/data-admin/create', [AdminController::class, 'create']);
    Route::post('/data-admin/store', [AdminController::class, 'store']);
    Route::get('/data-admin/edit/{id}', [AdminController::class, 'edit']);
    Route::post('/data-admin/update/{id}', [AdminController::class, 'update']);
    Route::delete('/data-admin/delete/{id}', [AdminController::class, 'destroy']);
    // PMB
    Route::get('/data-murid-baru', [PMBController::class, 'index']);
    Route::get('/data-murid-baru/edit', [PMBController::class, 'edit']);
    // murid
    Route::get('/data-murid', [MuridController::class, 'index'])->name('murid.index');
    Route::get('/data-murid/create', [MuridController::class, 'create']);
    Route::post('/data-murid/store', [MuridController::class, 'store']);
    Route::get('/data-murid/edit/{id}', [MuridController::class, 'edit']);
    Route::post('/data-murid/update/{id}', [MuridController::class, 'update']);
    Route::delete('/data-murid/delete/{id}', [MuridController::class, 'destroy']);
    //pengajar
    Route::get('/data-pengajar', [PengajarController::class, 'index']);
    Route::get('/data-pengajar/create', [PengajarController::class, 'create']);
    Route::post('/data-pengajar/store', [PengajarController::class, 'store']);
    Route::get('/data-pengajar/edit/{id}', [PengajarController::class, 'edit']);
    Route::post('/data-pengajar/update/{id}', [PengajarController::class, 'update']);
    Route::delete('/data-pengajar/delete/{id}', [PengajarController::class, 'destroy']);
    //struktural
    Route::get('/data-struktural', [StrukturalController::class, 'index']);
    Route::get('/data-struktural/create', [StrukturalController::class, 'create']);
    Route::post('/data-struktural/store', [StrukturalController::class, 'store']);
    Route::get('/data-struktural/edit/{id}', [StrukturalController::class, 'edit']);
    Route::post('/data-struktural/update/{id}', [StrukturalController::class, 'update']);
    Route::delete('/data-struktural/delete/{id}', [StrukturalController::class, 'destroy']);
    // fan
    Route::get('/data-fan', [FanController::class, 'index'])->name('fan.index');
    Route::get('/data-fan/create', [FanController::class, 'create']);
    Route::post('/data-fan/store', [FanController::class, 'store']);
    Route::get('/data-fan/edit/{id}', [FanController::class, 'edit']);
    Route::post('/data-fan/update/{id}', [FanController::class, 'update']);
    Route::delete('/data-fan/delete/{id}', [FanController::class, 'destroy']);
    // blog
    Route::get('/blog', [BlogController::class, 'index']);
    Route::get('/blog/create', [BlogController::class, 'create']);
    Route::post('/blog/store', [BlogController::class, 'store']);
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit']);
    Route::post('/blog/update/{id}', [BlogController::class, 'update']);
    Route::delete('/blog/delete/{id}', [BlogController::class, 'destroy']);
});
