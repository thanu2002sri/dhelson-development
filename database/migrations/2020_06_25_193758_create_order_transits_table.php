<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTransitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_transits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('txn_id')->length(20);
            $table->string('booking_agent')->length(20);
            $table->string('destination_agent')->length(20);
            $table->string('security_guard')->length(20);
            $table->string('assigned_by')->length(20);
            $table->string('order_status')->length(20)->nullable();
            $table->string('status')->length(20)->nullable();
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
        Schema::dropIfExists('order_transits');
    }
}
