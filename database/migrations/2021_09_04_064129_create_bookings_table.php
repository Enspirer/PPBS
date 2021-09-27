<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('booking_type')->nullable();
            $table->text('pickup_from')->nullable();
            $table->text('destination')->nullable();
            $table->text('pickup_date')->nullable();
            $table->text('pickup_time')->nullable();
            $table->integer('passengers_count')->nullable();
            $table->integer('adults')->nullable();
            $table->integer('child')->nullable();
            $table->integer('baby')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('total_price')->nullable();
            $table->text('number_of_luggages')->nullable();
            $table->text('vehicle_number')->nullable()->comment('Flight or Train');
            $table->text('departure_date')->nullable();
            $table->text('departure_time')->nullable();
            $table->text('pickup_address')->nullable();
            $table->text('drop_address')->nullable();
            $table->text('return_pickup_address')->nullable();
            $table->text('return_drop_address')->nullable();
            $table->text('return_vehicle_number')->nullable()->comment('Flight or Train');
            $table->text('return_passengers_count')->nullable();
            $table->text('currency_types')->nullable();
            $table->text('customer_title')->nullable();
            $table->text('customer_name')->nullable();
            $table->text('customer_email')->nullable();
            $table->text('customer_telephone')->nullable();            
            $table->text('other_information')->nullable();
            $table->text('payment_method')->nullable();
            $table->text('status')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
