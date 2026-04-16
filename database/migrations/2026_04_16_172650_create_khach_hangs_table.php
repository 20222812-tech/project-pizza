<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('khach_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->string('sdt')->unique();
            $table->string('email')->nullable();
            $table->text('dia_chi')->nullable();
            $table->decimal('tong_chi_tieu', 12, 2)->default(0);
            $table->integer('so_don_hang')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('khach_hangs');
    }
};
