<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agency_id');
            $table->integer('event_id');
            $table->integer('bid_price');
            $table->timestamps();
            $table->foreign('agency_id')->references('id')->on('user');
            $table->foreign('event_id')->references('id')->on('event');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidings');
    }
}
