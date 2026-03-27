<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NhanVienController;

Route::get('/nhanvien', [NhanVienController::class, 'index']);
Route::get('/nhanvien/create', [NhanVienController::class, 'create']);
Route::post('/nhanvien/store', [NhanVienController::class, 'store']);
Route::get('/nhanvien/edit/{id}', [NhanVienController::class, 'edit']);
Route::post('/nhanvien/update/{id}', [NhanVienController::class, 'update']);
Route::post('/nhanvien/delete/{id}', [NhanVienController::class, 'destroy']);
