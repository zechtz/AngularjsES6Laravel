<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $guarded =  ["id"];

    protected $table   =  "stations";

    public static $rules = [
        "name" => "required",
        "description" => "required",
        "latitude" => "required",
        "longitude" => "required",
        "shape_file_path" => "required",
        "location_id" => "required",
        "institution_id" => "required",
        "station_category_id" => "required",
    ];
    public static $create_rules = [
        "name"  => "required",
     ];

    /**
     * @return Location
     */
    function location()
    {
        return $this->hasOne(Location::class);
    }

    /**
     * @return Institution
     */
    function institution()
    {
        return $this->hasOne(Institution::class);
    }

    /**
     * @return Station Category
     */
     function stationCategory()
    {
        return $this->hasOne(StationCategory::class);
    }

}
