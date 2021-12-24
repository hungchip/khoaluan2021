<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_blogs', function (Blueprint $table) {
            $table->increments('blog_id');
            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('admin_id')->on('hc_admins')->onDelete('cascade');
            $table->string('title');
            $table->text('quote');
            $table->longText('content');
            $table->string('thumbnail');
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
        Schema::dropIfExists('hc_blogs');
    }
}
