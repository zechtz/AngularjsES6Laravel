<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $table    =  "institutions";
    protected $fillable =  [
        "name", "email", "phone_number", "institution_id", "address", "additional_information"
    ];

    public static $rules = [
        "name"  => "required|unique:institutions",
        "email" => "required",
    ];

    public static $create_rules = [
        "name"  => "required|unique:institutions",
        "email" => "required|unique:institutions",
    ];
}
