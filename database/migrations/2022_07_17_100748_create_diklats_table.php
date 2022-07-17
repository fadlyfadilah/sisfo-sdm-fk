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
        Schema::create('diklats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_diklat')->nullable();
            $table->string('kategori_keg')->nullable();
            $table->string('nama_diklat')->nullable();
            $table->string('tingkatan_diklat')->nullable();
            $table->string('tahun_diklat')->nullable();
            $table->string('penyelenggara')->nullable();
            $table->string('peran')->nullable();
            $table->string('jumlah_jam')->nullable();
            $table->string('tempat')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->string('no_sk')->nullable();
            $table->string('tgl_sk')->nullable();
            $table->string('file_diklat')->nullable();
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
        Schema::dropIfExists('diklats');
    }
};
