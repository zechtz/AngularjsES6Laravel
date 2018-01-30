<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarrifDistributionRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarrif_distribution_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tarrif_id')
                ->unsigned()
                ->nullable()
                ->references('id')
                ->on('tarrifs')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->integer('tarrif_distribution_id')
                ->unsigned()
                ->nullable()
                ->references('id')
                ->on('tarrif_distributions')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->integer('gfs_code_id')
                ->unsigned()
                ->nullable()
                ->references('id')
                ->on('gfs_codes')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->double('rate');
            $table->double('amount');
            $table->index('tarrif_id');
            $table->index('tarrif_distribution_id');
            $table->index('gfs_code_id');
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
        Schema::dropIfExists('tarrif_distribution_rates');
    }
}
