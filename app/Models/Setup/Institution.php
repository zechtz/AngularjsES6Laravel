<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "institutions";

    public static $rules = [
        "name"  => "required",
        "email" => "required",
    ];

    public static $create_rules = [
        "name"  => "required|unique:institutions",
        "email" => "required|unique:institutions",
    ];

    /**
     * return all institution tarrifs
     * @return Tarrif
     */
    function tarrifs()
    {
        return $this->hasMany('App\Models\Setup\InstitutionTarrif', 'institution_id', 'tarrif_id');
    }
}
