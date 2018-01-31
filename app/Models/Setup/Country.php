<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //

    protected $guarded =  ["id"];

    protected $table   =  "countries";


    public static $rules = [
        "name"  => "required"

    ];


    public static $create_rules = [
        "name"  => "required|unique:countries",
        "country_code" => "required",
        "country_group_id" => "required"

    ];
}
