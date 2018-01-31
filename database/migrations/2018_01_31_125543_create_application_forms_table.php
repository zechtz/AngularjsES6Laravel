<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('application_form_id')->unsigned()->nullable();
            $table->integer('application_type_id')->unsigned();
            $table->foreign('application_form_id')
                ->references('id')
                ->on('application_forms')
                ->onUpdate("cascade")
                ->onDelete("restrict");
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
        Schema::dropIfExists('application_forms');
    }
}
