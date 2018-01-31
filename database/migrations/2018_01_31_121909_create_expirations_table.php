<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpirationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expirations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('institution_id')->unsigned();
            $table->string('item');
            $table->integer('number_of_days');
            $table->foreign('institution_id')->references('id')
                ->on('institutions')->onUpdate('cascade')
                ->onDelete('restrict');
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
        Schema::dropIfExists('expirations');
    }
}
