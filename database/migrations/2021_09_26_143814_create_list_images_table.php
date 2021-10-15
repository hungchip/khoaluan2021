<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_list_images', function (Blueprint $table) {
            $table->increments('list_image_id');
            $table->integer('room_type_id')->unsigned();
            $table->foreign('room_type_id')->references('room_type_id')->on('hc_room_types')->onDelete('cascade');
            $table->string('link')->nullable();
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
        Schema::dropIfExists('hc_list_images');
    }
}
