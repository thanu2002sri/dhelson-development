<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersBankDepostListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_bank_depost_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('batch_no');
            $table->string('distributor_id');
            $table->string('phone');
            $table->string('amount');
            $table->string('date');
            $table->enum('status', ['PENDING', 'SENT'])->default('PENDING');
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
        Schema::dropIfExists('users_bank_depost_lists');
    }
}
