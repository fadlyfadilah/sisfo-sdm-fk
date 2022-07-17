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
        Schema::create('sertifikasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bidang_studi')->nullable();
            $table->string('nosk_serti')->nullable();
            $table->string('tahun_serti')->nullable();
            $table->string('no_peserta')->nullable();
            $table->string('noreg')->nullable();
            $table->string('file_serdos')->nullable();
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
        Schema::dropIfExists('sertifikasis');
    }
};
