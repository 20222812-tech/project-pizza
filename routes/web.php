<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\KhoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Trang chủ
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/admin', [AdminController::class, 'dashboard']);

/*
|--------------------------------------------------------------------------
| Nhân viên
|--------------------------------------------------------------------------
*/
Route::get('/nhanvien', [NhanVienController::class, 'index']);
Route::get('/nhanvien/create', [NhanVienController::class, 'create']);
Route::post('/nhanvien/store', [NhanVienController::class, 'store']);
Route::get('/nhanvien/edit/{id}', [NhanVienController::class, 'edit']);
Route::post('/nhanvien/update/{id}', [NhanVienController::class, 'update']);
Route::post('/nhanvien/delete/{id}', [NhanVienController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| Sản phẩm
|--------------------------------------------------------------------------
*/
Route::get('/sanpham', [SanPhamController::class, 'index']);
Route::get('/sanpham/create', [SanPhamController::class, 'create']);
Route::post('/sanpham/store', [SanPhamController::class, 'store']);
Route::get('/sanpham/edit/{id}', [SanPhamController::class, 'edit']);
Route::post('/sanpham/update/{id}', [SanPhamController::class, 'update']);
Route::post('/sanpham/delete/{id}', [SanPhamController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| Đơn hàng
|--------------------------------------------------------------------------
*/
Route::get('/donhang', [DonHangController::class, 'index']);
Route::get('/donhang/create', [DonHangController::class, 'create']);
Route::post('/donhang/store', [DonHangController::class, 'store']);
Route::post('/donhang/delete/{id}', [DonHangController::class, 'destroy']);

// 🔥 UPDATE TRẠNG THÁI
Route::post('/donhang/update-status/{id}', [DonHangController::class, 'updateStatus']);

/*
|--------------------------------------------------------------------------
| Khách hàng
|--------------------------------------------------------------------------
*/
Route::get('/khachhang', [KhachHangController::class, 'index']);
Route::get('/khachhang/create', [KhachHangController::class, 'create']);
Route::post('/khachhang/store', [KhachHangController::class, 'store']);
Route::get('/khachhang/edit/{id}', [KhachHangController::class, 'edit']);
Route::post('/khachhang/update/{id}', [KhachHangController::class, 'update']);
Route::post('/khachhang/delete/{id}', [KhachHangController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| Kho
|--------------------------------------------------------------------------
*/
Route::get('/kho', [KhoController::class, 'index']);
Route::get('/kho/create', [KhoController::class, 'create']);
Route::post('/kho/store', [KhoController::class, 'store']);
Route::get('/kho/edit/{id}', [KhoController::class, 'edit']);
Route::post('/kho/update/{id}', [KhoController::class, 'update']);
Route::post('/kho/delete/{id}', [KhoController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| Quản lý người dùng (Admin only)
|--------------------------------------------------------------------------
*/
Route::get('/users', [UserController::class, 'index'])->middleware('check.role:admin');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->middleware('check.role:admin');
Route::post('/users/update/{id}', [UserController::class, 'update'])->middleware('check.role:admin');
Route::post('/users/delete/{id}', [UserController::class, 'destroy'])->middleware('check.role:admin');
