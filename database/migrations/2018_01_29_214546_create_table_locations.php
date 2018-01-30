<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLocations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('location_hierarchy_id')->unsigned();
            $table->timestamps();
            $table->foreign('parent_id')
                ->references('id')
                ->on('locations')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->foreign('location_hierarchy_id')
                ->references('id')
                ->on('location_hierarchies')
                ->onUpdate("cascade")
                ->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
