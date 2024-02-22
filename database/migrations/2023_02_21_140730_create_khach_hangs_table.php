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
        Schema::create('khach_hangs', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten');
            $table->string('email');
            $table->string('password');
            $table->string('so_dien_thoai');
            $table->integer('gioi_tinh')->comment('0: Nữ, 1: Nam, 2: Chưa xác định');
            $table->date('ngay_sinh');
            // Kệ nó - các bạn tạo mới ko cần quan tâm, khi nào tới thì thầy sẽ giảng
            $table->integer('is_active')->default(0);
            $table->string('hash_active')->nullable();
            $table->string('hash_reset')->nullable();
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
        Schema::dropIfExists('khach_hangs');
    }
};
