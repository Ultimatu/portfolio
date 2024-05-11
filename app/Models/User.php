<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'image',
        'password',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean',
    ];


    public function canAccessPanel($panel): bool
    {
        return str_contains($this->email, '@tonde') && $this->is_active;
    }


    public function getFilamentAvatarUrl(): string|null
    {
        if (str_contains($this->image, 'assets/img')) {
            return  asset($this->image);
        }
        return asset('storage/' . $this->image);
    }


    public function getImageAttribute($value): string
    {
        if (str_contains($value, 'assets/img')) {
            return $value;
        }
        return asset('storage/' . $value);
    }


    public function scopeActiveAccount($query)
    {
        return $query->where('is_active', true);
    }


}
