<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'rl_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'rl_name',
        'rl_description',
        'rl_created_by',
        'rl_updated_by',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'usr_role_id', 'rl_id');
    }
}
