<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class InstitutionTarrif extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];
    protected $table   =  "tarrif_fees";

    public static $rules = [
        "institution_id" => "required",
        "tarrif_id"      => "required",
    ];

    /**
     * institution tarrif belongs to many institutions
     * @param null
     * @return ElloquentCollection
     */
    public function institutions(){
        return $this->belongsToMany('App\Models\Setup\Institution', 'institution_tarrif_id', 'institution_id');
    }

    /**
     * institution tarrif belongs to many tarrifs
     * @param null
     * @return ElloquentCollection
     */
    public function tarrifs(){
        return $this->belongsToMany('App\Models\Setup\Tarrif', 'institution_tarrif_id', 'tarrif_id');
    }
}
