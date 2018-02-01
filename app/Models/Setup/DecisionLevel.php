<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class DecisionLevel extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = ["id"];

    protected $table = "decision_levels";

    public static $rules = [
        "name" => "required",
    ];

    public static $create_rules = [
        "name" => "required",
        "application_type_id" => "required",
    ];

    /**
     * Institution relationship
     * @return Institution
     */
    public function applicationType()
    {
        return $this->belongsTo(ApplicationType::class,'application_type_id');
    }
}
