<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarrifFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarrif_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('unit_id')->unsigned();
            $table->double('unit_price');
            $table->boolean('is_editable')->default(false);
            $table->integer('institution_tarrif_id')->unsigned();
            $table->integer('fee_group_id')->unsigned();
            $table->integer('country_group_id')->unsigned();
            $table->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->foreign('institution_tarrif_id')
                ->references('id')
                ->on('institution_tarrifs')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->foreign('fee_group_id')
                ->references('id')
                ->on('fee_groups')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->foreign('country_group_id')
                ->references('id')
                ->on('country_groups')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->index('unit_id');
            $table->index('institution_tarrif_id');
            $table->index('fee_group_id');
            $table->index('country_group_id');
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
        Schema::dropIfExists('tarrif_fees');
    }
}
