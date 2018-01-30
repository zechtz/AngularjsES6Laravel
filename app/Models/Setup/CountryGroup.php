<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class CountryGroup extends Model
{

    protected $guarded =  ["id"];

    protected $table   =  "country_groups";

    //
    public static $rules = [
        "name"  => "required|unique"
       
    ];

    public static $create_rules = [
        "name"  => "required|unique"
        
    ];

    public function get_country_groups(){
        $country_groups =  CountryGroup::all();
        $per_page     =  isset($country_groups['per_page'])? $country_groups['per_page'] : 15;
        $country_groups = customPaginate($country_groups, $per_page);
      return $country_groups;

    }
}
