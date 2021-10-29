<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomDeliveryDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_room_delivery_details', function (Blueprint $table) {
            $table->increments('room_delivery_detail_id');
            $table->integer('room_delivery_id')->unsigned();
            $table->foreign('room_delivery_id')->references('room_delivery_id')->on('hc_room_deliverys')->onDelete('cascade');
            $table->integer('room_id')->unsigned();
            $table->foreign('room_id')->references('room_id')->on('hc_rooms')->onDelete('cascade');
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
        Schema::dropIfExists('hc_room_delivery_details');
    }
}
