<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    const STATUS_Sheduled = 1;
    const STATUS_ReSheduled = 2;
    const STATUS_Cancelled = 3;



    public $fillable = [
        'customer_id',
        'appointment_date',
        'appointment_time',
        'user_id',
        'comment',
        'created_by',
        'status_id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }


    public function status()
    {
        return $this->belongsTo(AppointmentStatus::class, 'status_id');
    }



    public function updates()
    {
        return $this->hasMany(AppointmentUpdate::class);
    }
}
