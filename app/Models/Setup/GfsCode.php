<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class GfsCode extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "gfs_codes";

    public static $rules = [
        "code"          => "required|unique:gfs_codes",
        "description"   => "required",
    ];

    public static $create_rules = [
        "code"          => "required|unique:gfs_codes",
        "description"   => "required|unique:gfs_codes",
    ];

    /**
     * Returns the category of the GFS code
     * @return [type]
     */
    public function category(){
        return $this->hasOne(GfsCategory::class);
    }

    /**
     * Returns the Account Type of the GFS code
     * @return [type]
     */
    public function accountType(){
        return $this->hasOne(GfsAccountType::class);
    }

}
