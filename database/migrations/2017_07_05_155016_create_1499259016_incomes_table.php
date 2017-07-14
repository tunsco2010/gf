<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1499259016IncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('incomes')) {
            Schema::create('incomes', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('income_category_id')->unsigned()->nullable();
                $table->foreign('income_category_id', '50901_595ce088f2681')->references('id')->on('income_categories')->onDelete('cascade');
                $table->date('entry_date')->nullable();
                $table->string('amount');
                
                $table->timestamps();
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
