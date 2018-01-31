<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name','location_hierarchy_id'];
    protected $gurded   = ['id'];
    protected $table    = "locations";

    public static $rules = [
        'name'                 => 'required|max:100',
        'location_hierarchy_id' => 'required|integer',
        'parent_id'            => 'integer',
    ];
}
