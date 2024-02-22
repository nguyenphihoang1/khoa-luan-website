<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hoa_don_nhap_khos', function (Blueprint $table) {
            $table->id();
            $table->string('ma_hoa_don')->nullable();
            $table->integer('id_nha_cung_cap');
            $table->integer('tong_tien_hoa_don')->nullable();
            $table->text('ghi_chu')->nullable();
            $table->integer('tinh_trang')->default(0);
            $table->integer('id_admin')->nullable();
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
        Schema::dropIfExists('hoa_don_nhap_khos');
    }
};
