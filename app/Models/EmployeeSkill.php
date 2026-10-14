<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['employee_id', 'skill_type_id', 'skill_id', 'skill_level_id', 'level_progress','is_default_level', 'image', 'expired_date'])]
class EmployeeSkill extends Model
{
    //
}
