<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demo extends Model
{
    use HasFactory;

    public $fillable =['start_date','start_time','end_date','customer_id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
