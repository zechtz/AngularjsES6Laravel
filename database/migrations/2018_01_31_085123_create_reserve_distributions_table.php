<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReserveDistributionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve_distributions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('reserve_distribution_id')->unsigned()->nullable();
            $table->integer('reserve_hierarchy_id')->unsigned();
            $table->integer('attraction_site_id')->unsigned();
            $table->foreign('reserve_distribution_id')
                ->references('id')
                ->on('reserve_distributions')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->foreign('reserve_hierarchy_id')
                ->references('id')
                ->on('reserve_hierarchies')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->foreign('attraction_site_id')
                ->references('id')
                ->on('attraction_sites')
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
        Schema::dropIfExists('reserve_distributions');
    }
}
