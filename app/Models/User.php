<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'usr_id';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;

    protected $fillable = [
        'usr_name',
        'usr_email',
        'usr_password',
        'usr_role_id',
        'usr_major_id',
        'usr_class_level_id',
    ];

    protected $hidden = [
        'usr_password',
        'remember_token',
    ];

    // Penting: agar Auth pakai kolom usr_password
    public function getAuthPassword()
    {
        return $this->usr_password;
    }

    // Relasi
    public function role()
    {
        return $this->belongsTo(Role::class, 'usr_role_id', 'rl_id');
    }

    public function major()
    {
        return $this->belongsTo(Major::class, 'usr_major_id', 'major_id');
    }

    public function classLevel()
    {
        return $this->belongsTo(ClassLevel::class, 'usr_class_level_id', 'class_level_id');
    }
    public function teacherSubjects()
    {
        return $this->hasMany(TeacherSubject::class, 'ts_teacher_id', 'usr_id');
    }
    public function schedules()
{
    return $this->hasMany(Schedule::class, 'schedule_user_id', 'usr_id');
}

}
