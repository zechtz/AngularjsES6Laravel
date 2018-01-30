<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeteorologicalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meteorological_details', function (Blueprint $table) {
            $table->increments('id');
            $table->float('humidity')->nullable();
            $table->float('avg_temp')->nullable();
            $table->float('avg_rainfall')->nullable();
            $table->float('comfortabilty_index')->nullable();
            $table->date('last_update')->nullable();
            $table->date('attraction_site_id');
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
        Schema::dropIfExists('meteorological_details');
    }
}
