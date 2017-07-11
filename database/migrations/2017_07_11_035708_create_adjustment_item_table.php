<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustmentItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjustment_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('adjustment_id')->unsigned();
            $table->foreign('adjustment_id')->references('id')->on('adjustments');
            $table->integer('item_id');
            $table->integer('adjustment');
            $table->integer('diff');
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
        Schema::table('adjustment_item', function (Blueprint $table) {
            $table->dropForeign(['adjustment_id']);
        });

        Schema::dropIfExists('adjustment_item');
    }
}
