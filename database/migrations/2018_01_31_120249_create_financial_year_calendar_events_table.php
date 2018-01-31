<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialYearCalendarEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financial_year_calendar_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('calendar_event_id')->unsigned();
            $table->integer('financial_year_id')->unsigned();
            $table->foreign('calendar_event_id')
                ->references('id')->on('calendar_events')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreign('financial_year_id')
                ->references('id')->on('financial_years')
                ->onUpdate('cascade')
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
        Schema::dropIfExists('financial_year_calendar_events');
    }
}
