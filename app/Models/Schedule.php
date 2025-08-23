<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'schedules_id';

    protected $fillable = [
        'schedule_user_id',
        'schedule_subject_id',
        'schedule_class_level_id',
        'schedule_day',
        'schedule_start_time',
        'schedule_end_time',
        'schedule_room',
        'schedule_created_by',
        'schedule_updated_by',
        'schedule_deleted_by',
    ];

    // === Relasi ===
    public function teacher()
    {
        // relasi ke tabel users (usr_id)
        return $this->belongsTo(User::class, 'schedule_user_id', 'usr_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'schedule_subject_id', 'subject_id');
    }

    public function classLevel()
    {
        return $this->belongsTo(ClassLevel::class, 'schedule_class_level_id', 'class_level_id');
    }
    public function teacherSubject()
    {
        return $this->belongsTo(TeacherSubject::class, 'schedule_subject_id', 'ts_id');
    }
}
