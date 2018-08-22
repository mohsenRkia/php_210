<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('checkin');
            $table->string('checkout');
            $table->integer('rentdays');
            $table->integer('costumer_id')->unsigned();
            $table->integer('place_id')->unsigned();
            $table->double('totallprice');
            $table->integer('persons');
            $table->boolean('status');
            $table->string('ordercode');
            $table->timestamps();

            $table->foreign('costumer_id')->references('id')->on('costumers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
