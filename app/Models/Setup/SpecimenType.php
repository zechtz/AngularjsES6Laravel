<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class SpecimenType extends Model
{
      /*
    * the attributes 
    */
    protected $gurded   = ['id'];
    protected $fillable = ['name','description','specie_id'];
    protected $table    = 'specimen_types';

    public static $rules = [
        "name" => "required",
        "specie_id" => "required|integer|min:1",
    ];

     /**
     * return  specimenType's Specie
     *
     * @return Specie
     */
    public function specie()
    {
        return $this->belongsTo('App\Models\Setup\Specie', 'specie_id', 'id');
    }
}
