<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Cho phép thêm dữ liệu bằng mass assignment
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
        'is_active'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
