<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class AttractionSiteProfile extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "attraction_site_profiles";

    public static $rules = [];

    public static $create_rules = [
        "description"        => "required",
        "file_path"          => "required",
        "caption  "          => "required",
        "attraction_site_id" => "required",
    ];
}
