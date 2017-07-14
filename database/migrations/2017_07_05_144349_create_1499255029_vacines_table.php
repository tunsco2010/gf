<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1499255029VacinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('vacines')) {
            Schema::create('vacines', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('description')->nullable();
                $table->enum('interval', ["one","two","three","four","five","six","seven","eight","nine","ten","eleven","twelve"]);
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id', '50865_595cd0f5e1c93')->references('id')->on('vacinecategories')->onDelete('cascade');
                $table->date('last_vacine_date')->nullable();
                $table->date('next_vacine_date')->nullable();
                
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
        Schema::dropIfExists('vacines');
    }
}
