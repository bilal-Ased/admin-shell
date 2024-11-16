<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

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
        'date_of_birth',
        'gender',
        'customer_profile_id',
    ];

    public static function getTotalCount()
    {
        return self::count();
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }


    public function customerProfile()
    {
        return $this->hasOne(CustomerProfile::class, 'customer_id');
    }
}
