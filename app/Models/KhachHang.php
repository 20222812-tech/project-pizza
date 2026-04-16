<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'sdt',
        'email',
        'dia_chi',
        'tong_chi_tieu',
        'so_don_hang'
    ];

    public function donhangs()
    {
        return $this->hasMany(DonHang::class, 'khach_hang_id');
    }

    public function updateThongKe()
    {
        $this->update([
            'tong_chi_tieu' => $this->donhangs()->sum('tong_tien'),
            'so_don_hang' => $this->donhangs()->count()
        ]);
    }
}
