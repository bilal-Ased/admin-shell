<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'alternate_number',
        'email',
        'status',
    ];

    public static function getTotalCount()
    {
        return self::count();
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
