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

    public function institution(){
        return $this->belongsTo('App\Models\Setup\Institution','institution_id', 'id');
    }

    public function tarrif(){
        return $this->belongsTo('App\Models\Setup\Tarrif','tarrif_id', 'id');
    }
}
