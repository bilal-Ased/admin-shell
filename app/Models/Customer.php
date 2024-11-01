<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Customer extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'alternate_number',
        'email',
        'status',
        'date_of_birth',
        'gender',
    ];

    public static function getTotalCount()
    {
        return self::count();
    }
}
