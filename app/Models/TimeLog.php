<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLog extends Model
{
    use HasFactory;

    // Define the fillable attributes for mass assignment
    protected $fillable = [
        'user_id',
        'sub_project_id',
        'date',
        'start_time',
        'end_time',
        'total_hours',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subProject()
    {
        return $this->belongsTo(SubProject::class);
    }
}
