<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class SpecieCategory extends Model
{
    //The attributes that are not assignable
    protected $guarded = ["id"];
    protected $table = "specie_categories";

    public static $rules = [
        "name" => "required"
    ];
}
