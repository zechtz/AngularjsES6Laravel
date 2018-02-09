<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Quota extends Model
{
    protected $gurded = ['id'];
    protected $table  = 'quotas';

    protected $rules = [
        'calendar_event_id' =>'required|integer',
        'specie_id'         => 'required|integer',
        'attraction_site_id'=>'required|integer',
        'quantity'          =>'required|integer'
    ];

}
