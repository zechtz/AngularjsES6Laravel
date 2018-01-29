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
     * return all institution tarrifs
     * @return Tarrif
     */
    function institutions()
    {
        return $this
            ->belongsToMany('App\Models\Setup\InstitutionTarrif', 'institution_tarrifs', 'institution_id', 'tarrif_id');
    }
}
