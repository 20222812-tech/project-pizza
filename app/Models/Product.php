<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Cho phép thêm dữ liệu bằng mass assignment
    protected $fillable = [
        'name',
        'slug',
        'description',
        'ingredients',
        'price',
        'image',
        'preparation_time',
        'is_available',
        'is_featured',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
