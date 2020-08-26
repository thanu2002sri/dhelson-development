<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpsTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gps_trackings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gps_status', 20)->nullable();
            $table->string('latitude', 20)->nullable();
            $table->string('longtitude', 20)->nullable();
            $table->string('deviceID', 30)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gps_trackings');
    }
}
