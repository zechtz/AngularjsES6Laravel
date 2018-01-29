<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class GfsCategory extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "gfs_categories";

    public static $rules = [
        "name"          => "required|unique:gfs_categories",
        "description"   => "required",
    ];

    public static $create_rules = [
        "name"          => "required|unique:gfs_categories",
        "description"   => "required|unique:gfs_categories",
    ];
}
