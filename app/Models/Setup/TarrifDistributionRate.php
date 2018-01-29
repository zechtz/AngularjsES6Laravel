<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class TarrifDistributionRate extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];
    protected $table   =  "tarrif_distribution_rates";

    public static $rules = [
        "tarrif_id"              => "required",
        "tarrif_distribution_id" => "required",
        "rate"                   => "required",
        "amount"                 => "required",
    ];

    /**
     * return tarrif distribution's tarrif
     *
     * @return Tarrif
     */
    public function tarrif()
    {
        return $this->BelongsTo('App\Models\Setup\Tarrif', 'tarrif_id', 'id');
    }

    /**
     * return tarrif distribution's tarrif
     *
     * @return Tarrif
     */
    public function tarrifDistribution()
    {
        return $this->BelongsTo('App\Models\Setup\TarrifDistribution', 'tarrif_distribution_id', 'id');
    }

}
