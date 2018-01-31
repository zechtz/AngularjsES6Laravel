<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class LocationHierarchy extends Model
{
    /**
    * the attribute that are not assignable
    **/
    protected $gurded   = ['id'];
    protected $fillable = ['name','hierarchy_position','sort_order'];
    protected $table    = 'location_hierarchies';

    public static $rules = [
        "name"               => "required|max:100",
        "hierarchy_position" => "required|integer|min:1",
        "sort_order"         => "required|integer|min:1",
    ];

}
