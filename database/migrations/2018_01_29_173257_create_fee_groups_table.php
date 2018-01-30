<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeeGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->notNull();
            $table->integer('fee_group_id')
                ->unsigned()
                ->nullable()
                ->references('id')
                ->on('fee_groups')
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
        Schema::dropIfExists('fee_groups');
    }
}
