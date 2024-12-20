<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whatsapp extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id', 'company_name', 'message_id', 'from_number', 'from_username', 'from_id', 'text_body', 'type', 'message',
    ];
}
