<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('branch_prefix', 10)->nullable();
            $table->string('branch_city', 30)->nullable();
            $table->string('branches_count', 20)->nullable();
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
        Schema::dropIfExists('all_branches');
    }
}
