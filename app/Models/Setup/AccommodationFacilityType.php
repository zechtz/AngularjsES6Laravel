<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccommodationFacilityType extends Model
{
    protected $guarded =  ["id"];

    protected $table   =  "accommodation_facility_types";

    public static $rules = [
        "name"  => "required"
    ];

    public static $create_rules = [
        "name"  => "required|unique:accommodation_facility_types"
    ];
}
