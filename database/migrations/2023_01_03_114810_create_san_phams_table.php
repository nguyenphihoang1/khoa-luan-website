<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('ten_san_pham');
            $table->string('slug_san_pham');
            $table->text('hinh_anh');
            $table->longText('mo_ta');
            $table->integer('id_chuyen_muc');
            $table->integer('trang_thai')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('san_phams');
    }
};
