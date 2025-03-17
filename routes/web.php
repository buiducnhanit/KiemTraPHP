<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HocPhanController;

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
    return view('welcome');
});

Route::resource('sinhvien', SinhVienController::class);
Route::get('/sinhvien/{id}', [SinhVienController::class, 'show'])->name('sinhvien.show');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/hocphan', [HocPhanController::class, 'index'])->name('hocphan.index');
Route::post('/hocphan/dangky', [HocPhanController::class, 'dangKyHocPhan'])->name('hocphan.dangky');
Route::get('/hocphan/dadangky', [HocPhanController::class, 'hocPhanDaDangKy'])->name('hocphan.dadangky');
Route::delete('/hocphan/dangky/xoa/{maHP}', [HocPhanController::class, 'xoaHocPhanDangKy'])->name('hocphan.dangky.xoa');
Route::delete('/hocphan/dangky/xoa-tat-ca', [HocPhanController::class, 'xoaToanBoDangKy'])->name('hocphan.dangky.xoa_tat_ca');