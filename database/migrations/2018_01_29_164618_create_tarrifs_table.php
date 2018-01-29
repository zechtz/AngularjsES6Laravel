<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarrifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarrifs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('tarrif_id')
                ->unsigned()
                ->nullable()
                ->references('id')
                ->on('gfs_codes')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->integer('gfs_code_id')
                ->unsigned()
                ->nullable()
                ->references('id')
                ->on('gfs_codes')
                ->onUpdate("cascade")
                ->onDelete("restrict");
            $table->boolean('is_editable')->default(false);
            $table->index('tarrif_id');
            $table->index('gfs_code_id');
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
        Schema::dropIfExists('tarrifs');
    }
}
