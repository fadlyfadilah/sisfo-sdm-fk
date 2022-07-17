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
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('perguruan_tinggi')->nullable();
            $table->string('program_studi')->nullable();
            $table->string('gelar_akademik')->nullable();
            $table->string('bidang_studi')->nullable();
            $table->string('thn_masuk')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->string('tanggal_lulus')->nullable();
            $table->string('no_induk')->nullable();
            $table->string('jumlah_sks')->nullable();
            $table->string('ipk_lulus')->nullable();
            $table->string('sk_setara')->nullable();
            $table->date('tgl_setara')->nullable();
            $table->string('no_ijazah')->nullable();
            $table->string('tesis_diser')->nullable();
            $table->string('file_ijazah')->nullable();
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
        Schema::dropIfExists('pendidikans');
    }
};
