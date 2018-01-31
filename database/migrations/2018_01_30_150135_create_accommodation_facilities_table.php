<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccommodationFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodation_facilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('accommodation_facility_type_id')->unsigned();
            $table->integer('institution_id')->unsigned();
            $table->integer('tariff_free_id');
            $table->string('name');
            $table->string('description');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->boolean('visibility');
            $table->foreign('accommodation_facility_type_id')->references('id')
                ->on('accommodation_facility_types')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('institution_id')->references('id')
                ->on('institutions')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('accommodation_facilities');
    }
}
