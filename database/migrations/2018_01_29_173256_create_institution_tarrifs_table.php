<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionTarrifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institution_tarrifs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('institution_id')
                ->unsigned()
                ->references('id')
                ->on('institutions')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->integer('tarrif_id')
                ->unsigned()
                ->references('id')
                ->on('tarriffs')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->index('institution_id');
            $table->index('tarriff_id');
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
        Schema::dropIfExists('institution_tarrifs');
    }
}
