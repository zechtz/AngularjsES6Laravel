<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class ReserveDistribution extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "reserve_distributions";

    public static $rules = [
        "name"          => "required",
    ];

    public static $create_rules = [
        "name"          => "required",
        "reserve_hierarchy_id"   => "required",
        "attraction_site_id"   => "required",
    ];

    /**
     * @return Reserve Hierarchy
     */
    public function reserveHierarchy(){
        return $this->belongsTo(ReserveHierarchy::class,'reserve_hierarchy_id');
    }

    /**
     * Returns the Attraction Sites
     * @return [type]
     */
    public function attractionSite(){
        return $this->belongsTo(AttractionSite::class,'attraction_site_id');
    }
}
