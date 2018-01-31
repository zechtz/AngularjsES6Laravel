<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class ApplicationType extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "application_types";

    public static $rules = [
        "name"  => "required",
    ];

    public static $create_rules = [
        "name"  => "required",
        "institution_id" => "required",
        "require_approval" => "required",
        "require_fee" => "required",
        "validity_period" => "required",
    ];

    /**
     * Institution relationship
     * @return Institution
     */
    public function institution()
    {
        return $this->belongsTo(Institution::class,'institution_id');
    }
}
