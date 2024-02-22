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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ho_lot');
            $table->string('ten_khach');
            $table->string('ho_va_ten');
            $table->string('email');
            $table->string('so_dien_thoai');
            $table->string('dia_chi');
            $table->integer('id_khach_hang');
            $table->string('hash_don_hang')->comment('DHDZ158968')->nullable();
            $table->integer('phi_ship')->nullable();
            $table->integer('tien_hang')->nullable();
            $table->integer('tong_thanh_toan')->nullable();
            $table->integer('thanh_toan')->default(-1)->comment('-1: Chưa thanh toán, 0: Thanh toán tự động, >1 : id của nhân viên bấm thanh toán');
            $table->integer('giao_hang')->default(0)->comment('0: Chưa giao hàng, 1: Đang vận chuyển, 2: Đã nhận hàng');
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
        Schema::dropIfExists('don_hangs');
    }
};
