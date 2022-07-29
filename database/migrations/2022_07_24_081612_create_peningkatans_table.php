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
        Schema::create('peningkatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_kegiatan')->nullable();
            $table->string('nama_kegiatan')->nullable();
            $table->string('tempat')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->string('peran')->nullable();
            $table->string('tingkatan_kegiatan')->nullable();
            $table->string('tahun_kegiatan')->nullable();
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
        Schema::dropIfExists('peningkatans');
    }
};
