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
        Schema::table('jafungs', function (Blueprint $table) {
            $table->unsignedBigInteger('biodata_id')->nullable();
            $table->foreign('biodata_id', 'biodata_fk_6998905')->references('id')->on('biodata');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jafungs', function (Blueprint $table) {
            //
        });
    }
};
