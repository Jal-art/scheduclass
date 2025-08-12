<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';
    protected $primaryKey = 'sch_id';

    protected $fillable = [
        'sch_teacher_subject_id',
        'sch_day',
        'sch_start_time',
        'sch_end_time',
    ];

    public function teacherSubject()
    {
        return $this->belongsTo(Teacher::class, 'sch_teacher_subject_id', 'ts_id');
    }
}
