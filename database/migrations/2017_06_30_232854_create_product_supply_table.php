<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSupplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_supply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->decimal('price');
            $table->integer('quantity');
            $table->string('comments')->nullable();
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

    }
}
