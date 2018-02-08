<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeritsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('image_path');
            $table->integer('merit_id')->unsigned()->nullable();
            $table->integer('institution_id')->unsigned();
            $table->timestamps();
            $table->foreign('merit_id')
                ->references('id')
                ->on('merits')
                ->onUpdate("cascade")
                ->onDelete("restrict");
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
        Schema::dropIfExists('merits');
    }
}
