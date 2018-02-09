<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class AttractionSiteGrade extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "attraction_site_grades";

    protected $with    =  [];

    public static $rules = [
        "name"                          => "required",
    ];

    public static $create_rules = [
        "name"                          => "required",
    ];
}
