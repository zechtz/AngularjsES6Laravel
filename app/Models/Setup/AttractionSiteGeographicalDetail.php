<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class AttractionSiteGeographicalDetail extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "attraction_site_geographical_details";

    public static $rules = [];

    public static $create_rules = [
        "latitude"           => "required",
        "longitude"          => "required",
        "shape_file_path"    => "required",
        "attraction_site_id" => "required",
    ];
}
