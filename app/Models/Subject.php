<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';
    protected $primaryKey = 'subject_id';

    protected $fillable = [
        'subject_name',
        'subject_code',
        'subject_description',
        'subject_created_by',
        'subject_updated_by',
        'subject_deleted_by',
    ];

    // 1 Subject punya banyak Teacher (teacher_subject_id -> subject_id)
    public function teachers()
    {
        return $this->hasMany(Teacher::class, 'teacher_subject_id', 'subject_id');
    }

    // 1 Subject dipakai di banyak Schedule (schedule_subject_id -> subject_id)
    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'schedule_subject_id', 'subject_id');
    }
    public function teacherSubjects()
{
    return $this->hasMany(TeacherSubject::class, 'ts_subject_id', 'subject_id');
}

}
