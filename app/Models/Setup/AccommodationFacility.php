<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccommodationFacility extends Model
{
    //
    protected $table   =  "accommodation_facilities";

    public static $rules = [
        "name"  => "required"
    ];

    public static $create_rules = [
        "name"  => "required|unique:accommodation_facilities"
    ];
}
