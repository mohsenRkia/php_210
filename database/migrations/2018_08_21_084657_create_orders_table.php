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
            $table->integer('users_id')->unsigned();
            $table->integer('places_id')->unsigned();
            $table->double('totallprice');
            $table->integer('persons');
            $table->boolean('status')->default(0);
            $table->string('ordercode');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');

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
