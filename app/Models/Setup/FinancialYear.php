<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinancialYear extends Model
{
    protected $guarded =  ["id"];

    protected $table   =  "financial_years";


    public static $rules = [
        "name"             => "required",
        "start_date"       => "required",
        "end_date"   => "required"
    ];

    public static $create_rules = [
        "name"             => "required",
        "start_date"       => "required",
        "end_date"   => "required"
    ];
}
