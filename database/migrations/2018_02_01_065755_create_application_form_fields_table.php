<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationFormFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_form_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('types')->nullable();
            $table->string('expression');
            $table->boolean('is_required');
            $table->integer('order')->nullable();
            $table->integer('application_form_id')->unsigned();
            $table->foreign('application_form_id')
                ->references('id')
                ->on('application_forms')
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
        Schema::dropIfExists('application_form_fields');
    }
}
