<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\nqtKhoaController;

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



Route::get('/khoas', [nqtKhoaController::class, 'index'])->name('NqtKhoa.getallkhoa');
Route::get('/khoa/detail/{nqtMaKhoa}',[nqtKhoaController::class,'detail'])->name('NqtKhoa.nqtdetail');
Route::get('/khoa/edit/{nqtMaKhoa}',[nqtKhoaController::class,'nqtEdit'])->name('NqtKhoa.nqtedit');
Route::post('/khoa/edit',[nqtKhoaController::class,'nqtEditSubmit'])->name('NqtKhoa.nqtEditSubmit');

Route::get('/khoa/new',[nqtKhoaController::class,'nqtNew'])->name('NqtKhoa.nqtNew');
Route::post('/khoa/new',[nqtKhoaController::class,'nqtNewSubmit'])->name('NqtKhoa.nqtNewSubmit');