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
        Schema::create('kepangkatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gol')->nullable();
            $table->string('nomorsk')->nullable();
            $table->date('tgl_skin')->nullable();
            $table->date('tmtskin')->nullable();
            $table->string('masa_kerja')->nullable();
            $table->string('masa_bulan')->nullable();
            $table->string('upload_sk')->nullable();
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
        Schema::dropIfExists('kepangkatans');
    }
};
