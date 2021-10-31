<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_booking_details', function (Blueprint $table) {
            $table->increments('booking_detail_id');
            $table->integer('booking_id')->unsigned();
            $table->foreign('booking_id')->references('booking_id')->on('hc_bookings')->onDelete('cascade');
            $table->integer('room_type_id')->unsigned();
            $table->foreign('room_type_id')->references('room_type_id')->on('hc_room_types')->onDelete('cascade');
            $table->integer('amount')->default(0);
            $table->integer('roomAdult')->default(0);
            $table->integer('roomChild')->default(0);
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
        Schema::dropIfExists('hc_booking_details');
    }
}
