<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1499257417ConsumptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('consumptions')) {
            Schema::create('consumptions', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '50889_595cda49b90c1')->references('id')->on('users')->onDelete('cascade');
                $table->integer('quantity')->nullable();
                $table->date('date')->nullable();
                $table->string('description')->nullable();
                $table->integer('stock_id')->unsigned()->nullable();
                $table->foreign('stock_id', '50889_595cda49bf3a4')->references('id')->on('feeds')->onDelete('cascade');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('consumptions');
    }
}
