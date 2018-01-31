<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $guarded =  ["id"];

    protected $table   =  "stations";

    public static $rules = [
        "name" => "required",
    ];
    public static $create_rules = [
        "name"  => "required",
        "location_id" => "required",
        "institution_id" => "required",
        "station_category_id" => "required",
     ];

    /**
     * @return Location
     */
    function location()
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * @return Institution
     */
    function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    /**
     * @return Station Category
     */
     function stationCategory()
    {
        return $this->belongsTo(StationCategory::class);
    }

}
