<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'customer_id', 'description', 'start_date', 'end_date', 'material_id', 'budget'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class)->withPivot('quantity');
    }

    public function getTotalCostAttribute()
    {
        return $this->materials->sum(function ($material) {
            return $material->unit_price * $material->pivot->quantity;
        });
    }
}
