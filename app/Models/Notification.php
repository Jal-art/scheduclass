<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';
    protected $primaryKey = 'notif_id';

    protected $fillable = [
        'notif_user_id',
        'notif_message',
        'notif_is_read',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'notif_user_id', 'usr_id');
    }
}
