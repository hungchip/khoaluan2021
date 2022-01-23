<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_contacts', function (Blueprint $table) {
            $table->increments('contact_id');
            $table->string('contact_name');
            $table->string('contact_email');
            $table->integer('contact_phone');
            $table->longText('contact_content');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('hc_contacts');
    }
}
