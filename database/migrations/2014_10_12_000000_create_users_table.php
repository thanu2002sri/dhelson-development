<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profile_id', 30)->default(0);
            $table->integer('role')->nullable();
            $table->string('branch', 20)->nullable();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 15)->unique();
            $table->string('password');
            $table->string('pan')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('aadhar_pic')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('address')->nullable();
            $table->string('pincode', 10)->nullable();
            $table->string('city', 30)->nullable();
            $table->string('state', 30)->nullable();
            $table->string('country', 30)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->enum('status', ['0', '1'])->default('1');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
