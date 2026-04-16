<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SanPham;
use App\Models\KhachHang;

class DonHang extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten_khach',
        'sdt',
        'dia_chi',
        'san_pham_id',
        'so_luong',
        'tong_tien',
        'trang_thai',
        'khach_hang_id'
    ];

    public function sanpham()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id');
    }

    public function khachhang()
    {
        return $this->belongsTo(KhachHang::class, 'khach_hang_id');
    }
}
