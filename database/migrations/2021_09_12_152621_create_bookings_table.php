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
        Schema::create('hc_bookings', function (Blueprint $table) {
            $table->increments('booking_id');
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('room_id')->on('hc_rooms')->onDelete('cascade');
            $table->integer('guest_id')->unsigned();
            $table->foreign('guest_id')->references('guest_id')->on('hc_guests')->onDelete('cascade');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('order_id')->on('hc_orders')->onDelete('cascade');
            $table->integer('booking_adult');
            $table->integer('booking_child');
            $table->string('checkin');
            $table->string('checkout');
            $table->string('booking_note');
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
        Schema::dropIfExists('hc_bookings');
    }
}
