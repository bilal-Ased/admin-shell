<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tickets extends Model
{
    use HasFactory;


    const STATUS_OPEN = 1;



    public $fillable = ['customer_id', 'issue_source_id', 'issue_category_id', 'disposition_id', 'department_id', 'assigned_to', 'status_id', 'file_path', 'comments'];



    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }



    public function ticketSources()
    {
        return $this->belongsTo(TicketSources::class, 'issue_source_id');
    }


    public function ticketCategories()
    {
        return $this->belongsTo(TicketCategories::class, 'issue_category_id');
    }

    public function ticketStatuses()
    {
        return $this->belongsTo(TicketStatuses::class, 'status_id');
    }


    public function getAuthUserId()
    {
        return Auth::id();
    }
}
