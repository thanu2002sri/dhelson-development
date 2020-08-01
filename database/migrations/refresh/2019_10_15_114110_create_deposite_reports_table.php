<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepositeReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposite_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('batch_no');
            $table->string('sent_by');
            $table->string('phone');
            $table->string('amount');
            $table->string('date');
            $table->enum('status', ['PENDING', 'SENT'])->default('SENT');
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
        Schema::dropIfExists('deposite_reports');
    }
}
