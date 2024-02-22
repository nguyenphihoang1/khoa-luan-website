<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_ban_hangs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_san_pham');
            $table->integer('id_khach_hang');
            $table->integer('so_luong')->default(1);
            $table->integer('don_gia');
            $table->integer('thanh_tien');
            $table->integer('id_don_hang')->default(0)->comment('0: nghĩa là đang là giỏ hàng');
            $table->string('ten_san_pham')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_ban_hangs');
    }
};
