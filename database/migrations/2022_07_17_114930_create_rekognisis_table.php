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
        Schema::create('rekognisis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bidangahli')->nullable();
            $table->string('rekognisi')->nullable();
            $table->string('tingkat_reg')->nullable();
            $table->string('jenis_reko')->nullable();
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
        Schema::dropIfExists('rekognisis');
    }
};
