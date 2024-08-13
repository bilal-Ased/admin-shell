<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WhatsappContact extends Model
{
    use HasFactory;

    protected $fillable = ['company_id',
        'company_name',
        'from_number',
        'from_username',
        'from_phone',
        'whatsapp_contact_id',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(WhatsappMessage::class);
    }

    public function getLatestMessageAttribute()
    {
        return $this->messages()->first();
    }
}
