<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanVienController;

Route::get('/nhanvien', [NhanVienController::class, 'index']);
Route::get('/nhanvien/create', [NhanVienController::class, 'create']);
Route::post('/nhanvien/store', [NhanVienController::class, 'store']);
Route::get('/nhanvien/edit/{id}', [NhanVienController::class, 'edit']);
Route::post('/nhanvien/update/{id}', [NhanVienController::class, 'update']);
Route::post('/nhanvien/delete/{id}', [NhanVienController::class, 'destroy']);

use App\Http\Controllers\SanPhamController;

Route::get('/sanpham', [SanPhamController::class, 'index']);
Route::get('/sanpham/create', [SanPhamController::class, 'create']);
Route::post('/sanpham/store', [SanPhamController::class, 'store']);
Route::get('/sanpham/edit/{id}', [SanPhamController::class, 'edit']);
Route::post('/sanpham/update/{id}', [SanPhamController::class, 'update']);
Route::post('/sanpham/delete/{id}', [SanPhamController::class, 'destroy']);
