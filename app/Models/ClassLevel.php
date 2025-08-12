<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassLevel extends Model
{
    use HasFactory;

    protected $table = 'class_levels';
    protected $primaryKey = 'class_level_id';

    protected $fillable = [
        'class_level_name',
        
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'usr_class_level_id', 'class_level_id');
    }
}
