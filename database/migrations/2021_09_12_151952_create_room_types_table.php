<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_room_types', function (Blueprint $table) {
            $table->increments('room_type_id');
            $table->string('room_type_name');
            $table->longText('room_type_price');
            $table->text('room_type_desc');
            $table->text('room_type_info');
            $table->string('quote');
            $table->integer('room_type_adult')->default(1);
            $table->integer('room_type_child')->default(1);
            $table->string('avatar');
            $table->integer('room_type_amount')->default(0);
            // $table->string('list_image');
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
        Schema::dropIfExists('hc_room_types');
    }
}
