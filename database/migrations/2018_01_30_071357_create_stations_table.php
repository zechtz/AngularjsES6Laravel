<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('location_id')->unsigned();
            $table->integer('institution_id')->unsigned();
            $table->integer('station_id')->unsigned()->nullable();
            $table->text('description');
            $table->integer('station_category_id');
            $table->float('latitude');
            $table->float('longitude');
            $table->string('shape_file_path');
            $table->foreign('station_id')
                ->references('id')
                ->on('stations')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->foreign('station_id')
                ->references('id')
                ->on('stations')
                ->onUpdate("cascade")
                ->onDelete("restrict");
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
        Schema::dropIfExists('stations');
    }
}
