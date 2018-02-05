<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;

class ApplicationFormField extends Model
{
    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded =  ["id"];

    protected $table   =  "application_form_fields";

    public static $rules = [
        "name"  => "required",
    ];

    public static $create_rules = [
        "name"  => "required",
        "expression"  => "required",
        "is_required"  => "required",
        "application_form_id" => "required",
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
