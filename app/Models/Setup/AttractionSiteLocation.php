<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class AttractionSiteLocation extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "attraction_site_locations";

    public static $rules = [];

    public static $create_rules = [
        "attraction_site_id"  => "required",
        "location_id"         => "required",
    ];
}
