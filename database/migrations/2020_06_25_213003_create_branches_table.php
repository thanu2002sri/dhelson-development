<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('branch_id')->length(20);
            $table->string('agent_id')->length(20);
            $table->string('name')->length(80)->nullable();
            $table->string('email')->length(100);
            $table->string('phone')->length(15);
<<<<<<< HEAD
            $table->string('address')->nullable();            
=======
            $table->string('address')->nullable();    
            $table->text('descritpion')->nullable(); 
            $table->float('amount')->default(0.00); 
            $table->float('tax')->default(0.00); 
            $table->float('total_amount')->default(0.00); 
>>>>>>> 17b8941aa909b46bb74c7c7985185e20c5399a96
            $table->string('pincode')->length(10)->nullable();
            $table->string('city')->length(30);
            $table->string('state')->length(30);
            $table->string('country')->length(30);
            $table->string('lattitude')->length(50)->nullable();
            $table->string('logtitude')->length(50)->nullable();
            $table->enum('status', ['0', '1'])->default('1');
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
        Schema::dropIfExists('branches');
    }
}
