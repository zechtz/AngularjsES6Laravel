<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class StationCategory extends Model
{
    //
    protected $guarded =  ["id"];

    protected $table   =  "station_categories";

    public static $rules = [
        "name"  => "required",
    ];

    public static $create_rules = [
        "name"  => "required",
    ];
}
