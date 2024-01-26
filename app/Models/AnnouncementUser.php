<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'announcements_id',
        'user_id',
        'title',
        'tagged_by',
    ];


    public function announcement()
    {
        return $this->belongsTo(Announcements::class, 'announcements_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
