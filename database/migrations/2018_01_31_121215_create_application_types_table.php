<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('institution_id')->unsigned();
            $table->boolean('require_approval');
            $table->boolean('require_fee');
            $table->integer('validity_period');
            $table->timestamps();
            $table->foreign('institution_id')
                ->references('id')
                ->on('institutions')
                ->onUpdate("cascade")
                ->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application_types');
    }
}
