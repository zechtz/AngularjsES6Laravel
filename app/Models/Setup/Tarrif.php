<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Tarrif extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];
    protected $table   =  "tarrifs";

    public static $rules = [
        "description" => "required",
        "gfs_code_id" => "required",
    ];

    /**
     * Tarrif has many institutions
     * @param null
     * @return ElloquentCollection
     */
    function institutions()
    {
        return $this->hasMany('App\Models\Setup\InstitutionTarrif', 'tarrif_id', 'institution_tarrif_id');
    }
}
