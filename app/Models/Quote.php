<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = ['total_price', 'project_id'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
