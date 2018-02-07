<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDecisionLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decision_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('next_level')->nullable();
            $table->boolean('is_final')->nullable();
            $table->boolean('is_default')->nullable();
            $table->integer('application_type_id')->unsigned();
            $table->foreign('application_type_id')
                ->references('id')
                ->on('application_types')
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
        Schema::dropIfExists('decision_levels');
    }
}
