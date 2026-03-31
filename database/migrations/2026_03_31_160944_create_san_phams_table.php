<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('san_phams', function (Blueprint $table) {
        $table->id();
        $table->string('ten');
        $table->decimal('gia', 10, 2);
        $table->text('mo_ta')->nullable();
        $table->string('size')->default('Vừa');
        $table->integer('so_luong')->default(0);
        $table->string('hinh')->nullable();
        $table->timestamps();
    });
}

};
