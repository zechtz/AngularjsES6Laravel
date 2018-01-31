<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttractionSiteLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attraction_site_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attraction_site_id');
            $table->integer('location_id');
            $table->timestamps();
            $table->foreign('attraction_site_id')->references('id')->on('attraction_sites')->onUpdate("cascade")->onDelete("restrict");
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate("cascade")->onDelete("restrict");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attraction_site_locations');
    }
}
