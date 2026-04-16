<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSanPhamIdToDonHangsTable extends Migration
{
    public function up()
    {
        Schema::table('don_hangs', function (Blueprint $table) {
            $table->foreignId('san_pham_id')->nullable();
            $table->integer('so_luong')->default(1);
        });
    }

    public function down()
    {
        Schema::table('don_hangs', function (Blueprint $table) {
            $table->dropColumn(['san_pham_id', 'so_luong']);
        });
    }
}
