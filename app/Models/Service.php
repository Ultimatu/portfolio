<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'fa_icon',
        'is_active',
    ];


    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
