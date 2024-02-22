<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chuyen_mucs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_chuyen_muc');
            $table->string('slug_chuyen_muc');
            $table->integer('tinh_trang');
            $table->integer('id_chuyen_muc_cha');
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
        Schema::dropIfExists('chuyen_mucs');
    }
};
