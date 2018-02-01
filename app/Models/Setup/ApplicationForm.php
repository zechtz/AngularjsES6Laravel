<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "application_forms";

    public static $rules = [
        "name"  => "required",
    ];

    public static $create_rules = [
        "name"  => "required",
        "application_type_id" => "required",
    ];

    /**
     *Application type relation
     * @return Application type
     */
    public function applicationType()
    {
        return $this->belongsTo(ApplicationType::class,'application_type_id');
    }

    public function applicationFormField()
    {
        return $this->hasMany(ApplicationFormField::class);
    }
}
