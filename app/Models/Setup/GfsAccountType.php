<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class GfsAccountType extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "gfs_account_types";

    public static $rules = [
        "name"  => "required|unique:gfs_account_types",
        "description" => "required",
    ];

    public static $create_rules = [
        "name"  => "required|unique:gfs_account_types",
        "description" => "required|unique:gfs_account_types",
    ];

    /**
     * Each GFS code has an Account Type
     * @return [type]
     */
    public function gfsCode(){
        return $this->belongsTo(GfsCode::class);
    }

}
