<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class AttractionSite extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "attraction_sites";

    public static $rules = [
        "name"                          => "required",
        "institution_id"                => "required",
        "attraction_site_category_id"   => "required",
        "attraction_site_grade_id"      => "required",
    ];

    public static $create_rules = [
        "name"                          => "required",
        "institution_id"                => "required|unique:institutions",
        "attraction_site_category_id"   => "required",
        "attraction_site_grade_id"      => "required",
    ];
}
