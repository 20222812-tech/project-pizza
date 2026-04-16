<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_khach');
            $table->string('sdt');
            $table->text('dia_chi');
            $table->decimal('tong_tien', 10, 2)->default(0);
            $table->string('trang_thai')->default('Chờ xử lý');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('don_hangs');
    }
};
