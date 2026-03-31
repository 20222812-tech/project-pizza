<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $fillable = [
        'ten',
        'gia',
        'mo_ta',
        'hinh',
        'size',
        'so_luong'
    ];
}
