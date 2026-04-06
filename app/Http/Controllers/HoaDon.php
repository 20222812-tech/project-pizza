<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoa_dons';
    
    protected $fillable = [
        'ma_hoa_don', 
        'ten_khach_hang', 
        'email', 
        'so_dien_thoai',
        'dia_chi', 
        'tong_tien', 
        'phuong_thuc_thanh_toan', 
        'trang_thai', 
        'ghi_chu'
    ];

    public function chiTietHoaDons()
    {
        return $this->hasMany(ChiTietHoaDon::class);
    }
}