<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlotsTable extends Migration
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
            $table->integer('reserve_distribution_id')->unsigned();
            $table->integer('number');
            $table->integer('financial_year_id')->unsigned();
            $table->string('status');
            $table->integer('unit_id')->unsigned();
            $table->float('quantity',10,2)->nullable();
            $table->integer('specie_id')->unsigned();
            $table->timestamps();
            $table->foreign('reserve_distribution_id')->references('id')->on('reserve_distributions')->onUpdate("cascade")->onDelete("restrict");
            $table->foreign('financial_year_id')->references('id')->on('financial_years')->onUpdate("cascade")->onDelete("restrict");
            $table->foreign('unit_id')->references('id')->on('units')->onUpdate("cascade")->onDelete("restrict");
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
        Schema::dropIfExists('plots');
    }
}
