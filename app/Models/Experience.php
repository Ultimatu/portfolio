<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'title',
        'company',
        'location',
        'start_date',
        'end_date',
        'description',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];


    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

}
