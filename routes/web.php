<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\PMBController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/dashboard/data-murid',[DashboardController::class,'dataMurid']);
Route::get('/dashboard/data-murid-tahun',[DashboardController::class,'muridTahun']);
Route::get('/dashboard/data-pengajar',[DashboardController::class,'dataPengajar']);
Route::get('/dashboard/data-fan',[DashboardController::class,'dataFan']);
// profile
Route::get('/profile',[ProfileController::class,'index']);
Route::post('/profile/update/{id}',[ProfileController::class,'update']);
Route::post('/profile/visi-store',[ProfileController::class,'visiStore']);
Route::post('/profile/visi-update/{id}',[ProfileController::class,'visiUpdate']);
Route::get('/profile/visi-delete/{id}',[ProfileController::class,'visiDelete']);
Route::post('/profile/misi-store',[ProfileController::class,'misiStore']);
Route::post('/profile/misi-update/{id}',[ProfileController::class,'misiUpdate']);
Route::get('/profile/misi-delete/{id}',[ProfileController::class,'misiDelete']);
Route::post('/profile/tujuan-store',[ProfileController::class,'tujuanStore']);
Route::post('/profile/tujuan-update/{id}',[ProfileController::class,'tujuanUpdate']);
Route::get('/profile/tujuan-delete/{id}',[ProfileController::class,'tujuanDelete']);
// admin
Route::get('/data-admin',[AdminController::class,'index']);
// PMB
Route::get('/data-murid-baru',[PMBController::class,'index']);
Route::get('/data-murid-baru/edit',[PMBController::class,'edit']);
// murid
Route::get('/data-murid', [MuridController::class, 'index'])->name('murid.index');
Route::get('/data-murid/create',[MuridController::class,'create']);
Route::post('/data-murid/store',[MuridController::class,'store']);
Route::get('/data-murid/edit/{id}',[MuridController::class,'edit']);
Route::post('/data-murid/update/{id}',[MuridController::class,'update']);
Route::delete('/data-murid/delete/{id}', [MuridController::class, 'destroy']);




