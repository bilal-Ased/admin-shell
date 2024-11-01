<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public $fillable = [
        'customer_id',
        'appointment_date',
        'appointment_time',
        'user_id',
        'comment',
        'created_by'
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
}
