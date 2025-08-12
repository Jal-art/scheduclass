<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $table = 'majors';
    protected $primaryKey = 'major_id';

    protected $fillable = [
        'major_name',
        'major_description',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'usr_major_id', 'major_id');
    }
}
