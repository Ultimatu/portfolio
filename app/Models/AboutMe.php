<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutMe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'cv',
        'phone',
        'email',
        'address',
        'birthday',
        'degree',
        'experience',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'github',
        'skype',
        'discord',
        'whatsapp',
        'telegram',
        'youtube',
        'freelance_status',
        'is_active',
        'positions',
    ];

    protected $casts = [
        'freelance_status' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getImageAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
