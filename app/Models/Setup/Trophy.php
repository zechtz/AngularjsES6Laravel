<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Trophy extends Model
{
     /*
    * the attribute 
    */
    protected $gurded   = ['id'];
    protected $fillable = ['name','description'];
    protected $table    = 'trophies';

    public static $rules = [
        "name" => "required"
    ];

}
