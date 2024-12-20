<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Tickets extends Model
{
    use HasFactory;


    const STATUS_OPEN = 1;
    const STATUS_InProgress = 2;
    const STATUS_Closed = 3;




    public $fillable = ['customer_id', 'issue_source_id', 'issue_category_id', 'disposition_id', 'department_id', 'assigned_to', 'status_id', 'file_path', 'comments', 'created_by'];



    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function ticketSources()
    {
        return $this->belongsTo(TicketSources::class, 'issue_source_id');
    }

    public function ticketCategories()
    {
        return $this->belongsTo(TicketCategories::class, 'issue_category_id');
    }

    public function status()
    {
        return $this->belongsTo(TicketStatuses::class, 'status_id');
    }
    public function ticketDisposition()
    {
        return $this->belongsTo(TicketDispositions::class, 'disposition_id');
    }
    public function ticketDepartment()
    {
        return $this->belongsTo(Department::class, 'disposition_id');
    }


    public function getAuthUserId()
    {
        return Auth::id();
    }
}
