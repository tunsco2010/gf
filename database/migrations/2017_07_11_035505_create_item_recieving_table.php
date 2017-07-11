<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemRecievingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_receiving', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('receiving_id')->unsigned();
            $table->foreign('receiving_id')->references('id')->on('receiving');
            $table->integer('item_id');
            $table->decimal('price');
            $table->integer('quantity');
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
        Schema::table('item_receiving', function (Blueprint $table) {
            $table->dropForeign(['receiving_id']);
        });

        Schema::dropIfExists('item_receiving');
    }
}
