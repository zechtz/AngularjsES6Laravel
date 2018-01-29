<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class MeteorologicalDetail extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "meteorological_details";

    public static $rules = [
        "attraction_site_id" => "required",
    ];
}
