<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentUpdate extends Model
{
    use HasFactory;


    protected $fillable = [
        'appointment_id',
        'user_id',
        'update_date',
        'worked_teeth',
        'comments',
        'files',
        'status_id'
    ];

    protected $casts = [
        'files' => 'array', // Cast JSON field
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
