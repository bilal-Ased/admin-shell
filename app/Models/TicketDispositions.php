<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketDispositions extends Model
{
    use HasFactory;
    public $fillable = ['name', 'status'];
}
