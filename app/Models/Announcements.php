<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content'];



    public function users()
    {
        return $this->belongsToMany(User::class, 'announcement_user')->withPivot(['title', 'tagged_by']);
    }


}
