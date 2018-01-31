<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialYearCalendarEvent extends Model
{
    protected $guarded =  ["id"];
    protected $table   =  "financial_year_calendar_events";

    public static $rules = [

    ];

    public static $create_rules = [
        "calendar_event_id"             => "required",
        "financial_year_id"       => "required"
    ];
}
