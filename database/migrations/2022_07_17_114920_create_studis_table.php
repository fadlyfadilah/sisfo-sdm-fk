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
        Schema::create('studis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenjang')->nullable();
            $table->string('bidang_studi')->nullable();
            $table->string('univ')->nullable();
            $table->string('negara')->nullable();
            $table->string('mulai')->nullable();
            $table->string('akademik')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studis');
    }
};
