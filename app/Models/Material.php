<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials';

    protected $fillable = [
        'ten',
        'don_vi',
        'so_luong',
        'gia_nhap',
        'so_luong_toi_thieu',
        'ngay_nhap',
        'ghi_chu'
    ];

    protected $casts = [
        'ngay_nhap' => 'date'
    ];

    public function isCanhBao()
    {
        return $this->so_luong <= $this->so_luong_toi_thieu;
    }
}
