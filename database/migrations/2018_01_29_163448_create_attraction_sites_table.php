<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttractionSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attraction_sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('institution_id')->unsigned();
            $table->text('description');
            $table->integer('attraction_site_category_id')->unsigned();
            $table->integer('attraction_site_grade_id')->unsigned();
            $table->timestamps();
            $table->foreign('institution_id')->references('id')->on('institutions')->onUpdate("cascade")->onDelete("restrict");
            $table->foreign('attraction_site_category_id')->references('id')->on('attraction_site_categories')->onUpdate("cascade")->onDelete("restrict");
            $table->foreign('attraction_site_grade_id')->references('id')->on('attraction_site_grades')->onUpdate("cascade")->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attraction_sites');
    }
}
