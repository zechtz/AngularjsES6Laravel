<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGfsCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('gfs_codes', function (Blueprint $table) {
            $table ->increments('id');
            $table->string('code');
            $table->text('description');
            $table->integer('gfs_account_type_id')->unsigned();
            $table->integer('gfs_category_id')->unsigned();
            $table->foreign('gfs_category_id')
                ->references('id')
                ->on('gfs_categories')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->foreign('gfs_account_type_id')
                ->references('id')
                ->on('gfs_account_types')
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
        Schema::dropIfExists('gfs_codes');
    }
}
