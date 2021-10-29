<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomDelivery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_room_deliverys', function (Blueprint $table) {
            $table->increments('room_delivery_id');
            $table->integer('booking_id')->unsigned();
            $table->foreign('booking_id')->references('booking_id')->on('hc_bookings')->onDelete('cascade');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('admin_id')->on('hc_admins')->onDelete('cascade');
            $table->integer('guest_id')->unsigned();
            $table->foreign('guest_id')->references('guest_id')->on('hc_guests')->onDelete('cascade');
            $table->timestamps();// bào gồm ngày giao, ngày trả
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hc_room_deliverys');
    }
}
