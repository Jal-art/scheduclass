<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users'; // tabel
    protected $primaryKey = 'usr_id'; // PK

    protected $fillable = [
        'usr_name',
        'usr_email',
        'usr_password',
        'usr_role_id',
        'usr_major_id',
        'usr_class_level_id',
        'usr_created_by',
        'usr_updated_by',
        'usr_deleted_by',
        'usr_sys_note',
    ];

    protected $hidden = [
        'usr_password',
    ];

    // kasih tau Laravel kalau password field kita "usr_password"
    public function getAuthPassword()
    {
        return $this->usr_password;
    }
}
