<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'employee_id',
    'leave_type',
    'start_date',
    'end_date',
    'reason',
    'status',
    'notes',
])]
class LeaveRequest extends Model
{
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function employees() {
        return $this->hasMany(Employee::class);
    }
}