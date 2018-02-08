<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name','location_hierarchy_id'];
    protected $gurded   = ['id'];
    protected $table    = "locations";

    public static $rules = [
        'name'                  => 'required|max:100',
        'location_hierarchy_id' => 'required|integer',
        'parent_id'             => 'integer',
    ];

    public function stations()
    {
        return $this->hasMany(Station::class);
    }

    public function hierarchy() {
        return $this->belongsTo('App\Models\Setup\LocationHierarchy', 'location_hierarchy_id');
    }
}
