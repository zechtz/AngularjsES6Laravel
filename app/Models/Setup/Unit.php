<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "units";

    public static $rules = [
        "name"  => "required|unique:units",
        "code"  => "required",
    ];

    public static $create_rules = [
        "name"   => "required|unique:units",
        "code"   => "required|unique:units",
    ];
}
