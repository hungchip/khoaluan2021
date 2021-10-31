<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_guests', function (Blueprint $table) {
            $table->increments('guest_id');
            $table->string('guest_email');
            $table->string('guest_name');
            // $table->string('guest_password');
            $table->string('guest_address')->nullable();
            $table->integer('guest_idcard')->nullable();
            $table->double('guest_phone');
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
        Schema::dropIfExists('hc_guests');
    }
}
