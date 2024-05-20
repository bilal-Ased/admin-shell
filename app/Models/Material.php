<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'quantity_on_hand', 'unit_price', 'supplier_id', 'serial_number', 'brand_id', 'location_id', 'account_id'];

    public function projects()
    {
        return $this->belongsToMany(Project::class)->withPivot('quantity');
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class)->withPivot('price');
    }
}