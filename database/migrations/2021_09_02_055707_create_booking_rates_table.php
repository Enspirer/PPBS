<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('booking_type');
            $table->text('start_point')->nullable();
            $table->text('end_point')->nullable();
            $table->text('one_four_price')->nullable();
            $table->text('five_eight_price')->nullable();
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
        Schema::dropIfExists('booking_rates');
    }
}
