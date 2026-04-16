<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('don_vi'); // kg, lít, cái...
            $table->decimal('so_luong', 10, 2);
            $table->decimal('gia_nhap', 10, 2);
            $table->decimal('so_luong_toi_thieu', 10, 2)->default(5);
            $table->date('ngay_nhap');
            $table->text('ghi_chu')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
