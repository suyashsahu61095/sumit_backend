<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectForm extends Model
{
    protected $table = "project_forms";
    protected $fillable = [
        'project_by',
        'project_name',
        'rera_reg_no',
        'property_type',
        'project_address',
        'auth_person_name',
        'contact_no',
        'email',
        'promoter_name',
        'project_start_date',
        'project_completion_date',
        'brochure',
        'link',
        'property_config'
    ];
}
