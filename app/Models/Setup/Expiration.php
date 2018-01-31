<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expiration extends Model
{
    protected $guarded =  ["id"];

    protected $table   =  "expirations";

    public static $rules = [

    ];

    public static $create_rules = [
        "item"  => "required",
        "number_of_days"  => "required",
        "institution_id"  => "required"
    ];
}
