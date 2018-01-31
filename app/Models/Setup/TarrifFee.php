<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class TarrifFee extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];
    protected $table   =  "tarrif_fees";

    public static $rules = [
        "description"           => "required",
        "unit_id"               => "required",
        "unit_price"            => "required",
        "institution_tarrif_id" => "required",
        "fee_group_id"          => "required",
        "country_group_id"      => "required",
    ];
}
