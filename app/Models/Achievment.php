<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievment extends Model
{
    use HasFactory;

    protected $fillable = [
        'experience',
        'happy_clients',
        'projects_completed',
        'awards_won',
        'certifications',
        'years_of_experience',
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
