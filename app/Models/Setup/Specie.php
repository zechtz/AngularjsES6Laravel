<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class Specie extends Model
{
    /**
    * the attribute that are not assignable
    **/
    protected $gurded   = ['id'];
    protected $fillable = [
        'common_name',
        'botanical_name',
        'tags',
        'specie_category_id'
    ];
    protected $table    = 'species';

    public static $rules = [
        "common_name" => "required",
        "botanical_name" => "required",
        "specie_category_id" => "required|integer|min:1",
    ];

     /**
     * return  species's Category
     *
     * @return SpecieCategory
     */
    public function specieCategory()
    {
        return $this->belongsTo('App\Models\Setup\SpecieCategory', 'specie_category_id', 'id');
    }
}
