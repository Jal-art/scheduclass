<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teacher_subjects';
    protected $primaryKey = 'ts_id';

    protected $fillable = [
        'ts_teacher_id',
        'ts_subject_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'ts_teacher_id', 'usr_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'ts_subject_id', 'subject_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'sch_teacher_subject_id', 'ts_id');
    }
}
