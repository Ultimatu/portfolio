<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'fa_icon',
        'is_active',
        'image',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getIconAttribute()
    {
        return $this->fa_icon ?? 'fa fa-certificate';
    }

    public function getImageAttribute()
    {
        return asset('storage/' . $this->image);
    }

  
}
