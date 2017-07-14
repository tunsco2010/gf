<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1499258995TimeEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('time_entries')) {
            Schema::create('time_entries', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('work_type_id')->unsigned()->nullable();
                $table->foreign('work_type_id', '50896_595ce0737303d')->references('id')->on('time_work_types')->onDelete('cascade');
                $table->integer('project_id')->unsigned()->nullable();
                $table->foreign('project_id', '50896_595ce0737888d')->references('id')->on('time_projects')->onDelete('cascade');
                $table->datetime('start_time')->nullable();
                $table->datetime('end_time')->nullable();
                
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
        Schema::dropIfExists('time_entries');
    }
}
