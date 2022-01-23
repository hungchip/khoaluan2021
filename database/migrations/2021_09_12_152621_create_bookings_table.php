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
            $table->integer('guest_id')->unsigned()->nullable();
            $table->foreign('guest_id')->references('guest_id')->on('hc_guests')->onDelete('cascade');
            $table->string('checkin');
            $table->string('checkout');
            $table->integer('status')->default(0); // chờ duyệt
            $table->integer('amount');
            $table->integer('deposit')->nullable();
            $table->integer('deposit_status')->default(0);
            $table->integer('creater_id')->nullable();
            $table->integer('editor_id')->nullable();
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
