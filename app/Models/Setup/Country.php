<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //

    protected $guarded =  ["id"];

    protected $table   =  "countries";


    public static $rules = [
        "name"  => "required|unique",
        "country_code" => "required"

    ];


    public static $create_rules = [
        "name"  => "required|unique",
        "country_code" => "required"

    ];
}
