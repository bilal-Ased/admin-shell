<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;
    public $fillable = ['customer_id', 'issue_source_id', 'issue_category_id', 'disposition_id', 'department_id', 'assigned_to', 'status_id', 'file_path', 'comments'];
}
