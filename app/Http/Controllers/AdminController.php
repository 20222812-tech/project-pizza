<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use App\Models\SanPham;
use App\Models\DonHang;

class AdminController extends Controller
{
    public function dashboard()
{
    $tongNhanVien = \App\Models\NhanVien::count();
    $tongSanPham = \App\Models\SanPham::count();
    $tongDonHang = \App\Models\DonHang::count();

    $doanhThu = \App\Models\DonHang::where('trang_thai', 'Hoàn thành')
                    ->sum('tong_tien');

    // 🔥 BIỂU ĐỒ 7 NGÀY GẦN NHẤT (KHÔNG LỌC TRẠNG THÁI)
$chartLabels = [];
$chartData = [];

for ($i = 6; $i >= 0; $i--) {
    $date = now()->subDays($i);

    $chartLabels[] = $date->format('d/m');

    $tong = \App\Models\DonHang::whereDate('created_at', $date)
                ->sum('tong_tien'); // ❗ bỏ where trạng thái

    $chartData[] = $tong;
}


    return view('homeadmin', compact(
        'tongNhanVien',
        'tongSanPham',
        'tongDonHang',
        'doanhThu',
        'chartLabels',
        'chartData'
    ));
}

}
