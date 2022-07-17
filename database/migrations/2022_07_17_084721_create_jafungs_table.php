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
        Schema::create('jafungs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jab_fung')->nullable();
            $table->string('no_skjab')->nullable();
            $table->date('tmt_jab')->nullable();
            $table->string('leb_ajar')->nullable();
            $table->string('leb_pen')->nullable();
            $table->string('leb_pkm')->nullable();
            $table->string('leb_penun')->nullable();
            $table->string('file_jabfung')->nullable();
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
        Schema::dropIfExists('jafungs');
    }
};
