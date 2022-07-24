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
        Schema::create('biodata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->string('nidn')->nullable();
            $table->string('nidn_file')->nullable();
            $table->string('jk')->nullable();
            $table->string('tl')->nullable();
            $table->date('tgl')->nullable();
            $table->string('noktp')->nullable();
            $table->string('filektp')->nullable();
            $table->string('agama')->nullable();
            $table->string('kewarnegaraan')->nullable();
            $table->string('status_nikah')->nullable();
            $table->string('suami_istri')->nullable();
            $table->string('nipsuami_istri')->nullable();
            $table->string('pekerjaan_suami_istri')->nullable();
            $table->date('pns_suami_istri')->nullable();
            $table->string('pendikteks2')->nullable();
            $table->string('pendikteks3')->nullable();
            $table->string('nosertipen')->nullable();
            $table->string('nosertikom')->nullable();
            $table->string('bidangke_1')->nullable();
            $table->string('bidangke_2')->nullable();
            $table->string('homebase')->nullable();
            $table->string('email')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('dusun')->nullable();
            $table->string('desa')->nullable();
            $table->string('kota')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kodepos')->nullable();
            $table->string('telp_rumah')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('prodi')->nullable();
            $table->string('nip_pns')->nullable();
            $table->string('statuskep')->nullable();
            $table->string('jabfungtek')->nullable();
            $table->string('institusi')->nullable();
            $table->string('bagian')->nullable();
            $table->string('status_aktif')->nullable();
            $table->string('noskyayasan')->nullable();
            $table->date('ttg_sk_yayasan')->nullable();
            $table->string('sk_yayasandoc')->nullable();
            $table->string('nomor_sktmt')->nullable();
            $table->date('tgl_sktmt')->nullable();
            $table->string('sumber_gaji')->nullable();
            $table->string('npwp')->nullable();
            $table->string('pajak')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('matkul')->nullable();
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
        Schema::dropIfExists('biodata');
    }
};
