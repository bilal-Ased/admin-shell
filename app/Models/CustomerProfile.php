<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProfile extends Model
{
    use HasFactory;

    public $fillable = ['customer_id', 'allergy', 'bleeding', 'heart_disease', 'drug_therapy', 'pregnancy'];


    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_profile_id');
    }
}
