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
        Schema::table('peningkatans', function (Blueprint $table) {
            $table->unsignedBigInteger('biodata_id')->nullable();
            $table->foreign('biodata_id', 'biodata_fk_7039084')->references('id')->on('biodata');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peningkatans', function (Blueprint $table) {
            //
        });
    }
};
