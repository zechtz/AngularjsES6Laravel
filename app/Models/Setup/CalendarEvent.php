<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    protected $guarded =  ["id"];
    protected $table   =  "calendar_events";

    public static $rules = [

    ];

    public static $create_rules = [
        "event_id"   => "required",
        "start_date"             => "required",
        "end_date"       => "required"
    ];
}
