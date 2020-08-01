<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('app_version')->nullable();
            $table->float('upto_3_months')->default('0');
            $table->float('upto_3_6_months')->default('0');
            $table->float('upto_6_12_months')->default('0');
            $table->float('above_12_months')->default('0');
            $table->float('transit_tax')->default('0');
            $table->float('transit_priceOne')->default('0.00');
            $table->float('transit_priceTwo')->default('0.00');
            $table->float('transit_priceThree')->default('0.00');
            $table->float('transit_priceFour')->default('0.00');
            $table->float('transit_priceFive')->default('0.00');
            $table->date('month_start_date')->nullable();
            $table->date('month_end_date')->nullable();
            $table->enum('status', ['0', '1'])->default('0');
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
        Schema::dropIfExists('settings');
    }
}
