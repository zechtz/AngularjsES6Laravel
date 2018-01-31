<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded =  ["id"];
    protected $table   =  "events";

    public static $rules = [
        "name"             => "required",
        "description"       => "required"
    ];

    public static $create_rules = [
        "institution_id"   => "required",
        "name"             => "required",
        "description"       => "required"
    ];
}
