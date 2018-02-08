<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Merit extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "merits";

    public static $rules = [
        "name"  => "required",
    ];

    public static $create_rules = [
        "name"  => "required",
        "description"=>"required",
        "image_path"=>"required",
    ];

    /**
     *
     * @return Institution
     */
    function institution()
    {
        return $this->belongsTo(Institution::class,'institution_id');
    }
}
