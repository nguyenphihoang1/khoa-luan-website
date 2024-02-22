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
        Schema::table('configs', function (Blueprint $table) {
            $table->string('image_slide_1')->nullable();
            $table->string('image_slide_2')->nullable();
            $table->string('title_slide_1')->nullable();
            $table->string('title_slide_2')->nullable();
            $table->string('des_slide_1')->nullable();
            $table->string('des_slide_2')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('configs', function (Blueprint $table) {
            //
        });
    }
};
