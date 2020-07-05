<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('txn_id')->length(20);
            $table->string('tacking_id')->length(20);
            $table->string('booking_agent')->length(20);
            $table->string('destination_agent')->length(20);
            $table->string('consigner_name')->length(100);
            $table->string('consigner_email')->length(100);
            $table->string('consigner_phone', 15)->nullable();
            $table->string('consigner_photo')->nullable();
            $table->string('consigner_aadhar')->nullable();
            $table->string('consigner_signature')->nullable();
            $table->string('consignee_name')->length(100);
            $table->string('consignee_phone')->length(100);
            $table->string('consignee_id')->length(20);
            $table->string('consignee_signature')->nullable();
            $table->string('shipment_name')->length(150);
            $table->string('shipment_img')->nullable();
            $table->text('shipment_descritpion')->nullable();
            $table->dateTime('insured_start_date')->nullable();
            $table->dateTime('insured_end_date')->nullable();
            $table->float('insured_value')->default(0.00);
            $table->float('amount')->default(0.00);
            $table->float('tax')->default(0.00);
            $table->float('total_amount')->default(0.00);
            $table->string('otp')->nullable();
            $table->enum('otp_status', ['0', '1'])->default('1');
            $table->string('booking_latitude')->length(100)->nullable();
            $table->string('booking_longtitude')->length(100)->nullable();
            $table->string('live_latitude')->length(100)->nullable();
            $table->string('live_longtitude')->length(100)->nullable();
            $table->string('destination_latitude')->length(100)->nullable();
            $table->string('destination_longtitude')->length(100)->nullable();
            $table->string('customer_care_signature')->nullable();
            $table->string('incharge_signature')->nullable();
            $table->string('security_guard')->length(20);
            $table->string('assigned_by')->length(20);
            $table->string('status')->length(20)->default('PENDING');
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
        Schema::dropIfExists('orders');
    }
}
