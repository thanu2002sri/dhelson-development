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
            $table->string('consigner_email')->length(100)->nullable();
            $table->string('consigner_phone')->length(15);
            $table->string('consigner_photo')->nullable();
            $table->string('consigner_aadhar')->nullable();
            $table->string('consigner_signature')->nullable();
            $table->string('consignee_name')->length(100);
            $table->string('consignee_phone')->length(100);
            $table->string('consignee_id')->length(20)->nullable();
            $table->string('consignee_signature')->nullable();
            $table->string('shipment_name')->length(100);
            $table->string('shipment_front')->nullable();
            $table->string('shipment_back')->nullable();
            $table->string('shipment_img')->nullable();
            $table->string('invoice_img')->nullable();
            $table->string('invoice_date')->length(10)->nullable();
            $table->float('insured_percentage')->default(0.00);
            $table->string('shipment_quantity')->length(5);
            $table->string('shipment_weight')->length(5);
            $table->float('unit_price')->default(0.00);
            $table->float('transit_amount')->default(0.00);
            $table->float('transit_tax')->default(0.00);
            $table->float('transit_total_amount')->default(0.00);
            $table->text('shipment_descritpion')->nullable();
            $table->string('address')->nullable();            
            $table->string('pincode')->length(10)->nullable();
            $table->string('city')->length(30);
            $table->string('state')->length(30);
            $table->string('country')->length(30);
            $table->string('lattitude')->length(50)->nullable();
            $table->string('logtitude')->length(50)->nullable();
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
