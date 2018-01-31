<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('calendar_event_id')->unsigned();
            $table->integer('specie_id')->unsigned();
            $table->integer('attraction_site_id')->unsigned();
            $table->integer('quantity');
            $table->foreign('calendar_event_id')->references('id')->on('calendar_events')->onUpdate("cascade")->onDelete("restrict");
            $table->foreign('attraction_site_id')->references('id')->on('attraction_sites')->onUpdate("cascade")->onDelete("restrict");
            $table->foreign('specie_id')->references('id')->on('species')->onUpdate("cascade")->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotas');
    }
}
