<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class ApplicationFormFieldOption extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "application_form_field_options";

    public static $rules = [
        "name"  => "required",
    ];

    public static $create_rules = [
        "name"  => "required",
        "value"  => "required",
        "application_form_field_id" => "required",
    ];

    /**
     * belongs to Form
     * @return belongs to Application Form
     */
    public function applicationForm()
    {
        return $this->belongsTo(ApplicationForm::class);
    }
}
