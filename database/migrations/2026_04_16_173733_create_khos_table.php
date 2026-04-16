<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('khos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('san_pham_id')->constrained('san_phams')->onDelete('cascade');
            $table->integer('so_luong');
            $table->date('ngay_nhap');
            $table->integer('so_luong_toi_thieu')->default(5);
            $table->text('ghi_chu')->nullable();
            $table->timestamps();

            $table->unique('san_pham_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('khos');
    }
};
