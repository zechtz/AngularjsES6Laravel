<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class TarrifDistribution extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "tarrif_distributions";

    public static $rules = [
        "name"  => "required",
    ];

    public static $create_rules = [
        "name"  => "required",
    ];
}
