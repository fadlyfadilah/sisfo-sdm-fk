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
        Schema::create('sertifikasiprofs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bidang_studi')->nullable();
            $table->string('no_re')->nullable();
            $table->string('no_sk')->nullable();
            $table->string('tahun_serti')->nullable();
            $table->string('file_serti')->nullable();
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
        Schema::dropIfExists('sertifikasiprofs');
    }
};
