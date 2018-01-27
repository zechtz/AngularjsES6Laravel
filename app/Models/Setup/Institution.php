<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    public static $rules = [
        "name"  => "required|unique",
        "email" => "required|unique",
    ];

    public static $create_rules = [
        "name"  => "required|unique",
        "email" => "required|unique:institutions",
    ];
}
