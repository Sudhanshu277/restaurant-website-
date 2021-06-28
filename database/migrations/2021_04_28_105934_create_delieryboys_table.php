<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDelieryboysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delieryboys', function (Blueprint $table) {
            $table->id();
            $table->string('delivery_boy_name');
            $table->string('phone_no');
            $table->string('password');
            $table->string('status');
            $table->string('date_of_joining');
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
        Schema::dropIfExists('delieryboys');
    }
}
