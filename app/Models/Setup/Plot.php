<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    protected $gurded   = ['id'];
    protected $fillable = ['number'];
    protected $table    = 'plots';

    public static $rules = [
        'number'                  => 'required|integer',
        'reserve_distribution_id' => 'required|integer',
        'financial_year_id'       => 'required|integer',
        'status'                  => 'required',
        'unit_id'                 => 'required|integer',
        'specie_id'               => 'required|integer',
    ];
}
