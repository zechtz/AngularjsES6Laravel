<?php

namespace App\Models\Currency;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "currencies";

    public static $rules = [
        "name"  => "required|unique:currencies",
        "code"  => "required",
    ];

    public static $create_rules = [
        "name"   => "required|unique:currencies",
        "code"   => "required|unique:currencies",
    ];
}
