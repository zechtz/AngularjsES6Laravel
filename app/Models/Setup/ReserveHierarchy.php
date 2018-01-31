<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class ReserveHierarchy extends Model
{
    /**
     * The attributes that aren't mass assignable
     */
    protected $guarded =  ["id"];
    protected $table   =  "reserve_hierarchies";
    public static $rules = [
        "name" => "required",
        "order" => "required",
    ];
    public static $create_rules = [
        "name"  => "required",
        "order" => "required",
    ];

    public function reserveDistributions()
    {
        return $this->hasMany(ReserveDistribution::class);
    }
}
