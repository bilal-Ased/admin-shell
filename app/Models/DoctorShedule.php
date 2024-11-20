<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorShedule extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'day', 'exception_date', 'start_time', 'end_time', 'is_available'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
