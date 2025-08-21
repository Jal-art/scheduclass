<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    // tabel yang benar harusnya 'teachers'
    protected $table = 'teachers';
    protected $primaryKey = 'teacher_id';

    protected $fillable = [
        'user_id',   // relasi ke users
        'major_id',  // jurusan guru
    ];

    // relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'usr_id');
    }

    // relasi ke jurusan
    public function major()
    {
        return $this->belongsTo(Major::class, 'major_id', 'major_id');
    }

    // relasi ke teacher_subjects
    public function teacherSubjects()
    {
        return $this->hasMany(TeacherSubject::class, 'ts_teacher_id', 'teacher_id');
    }
}
