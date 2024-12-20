<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WhatsappMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'whatsapp_contact_id', 'message_id', 'from_id', 'text_body', 'type', 'message',
    ];

    protected $table = 'whatsapp_messages';

    public function contact(): BelongsTo
    {
        return $this->belongsTo(WhatsappContact::class);
    }
}
