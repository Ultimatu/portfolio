<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

   

    protected $fillable = [
        'name',
        'description',
        'url',
        'is_active',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'image_6',
        'github',
        'stack',
        'type',
        'is_open_source',
    ];


    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }


    public function getImage1Attribute()
    {
        return asset('storage/' . $this->image_1);
    }

    public function getImage2Attribute()
    {
        return asset('storage/' . $this->image_2);
    }

    public function getImage3Attribute()
    {
        return asset('storage/' . $this->image_3);
    }

    public function getImage4Attribute()
    {
        return asset('storage/' . $this->image_4);
    }

    public function getImage5Attribute()
    {
        return asset('storage/' . $this->image_5);
    }

    public function getImage6Attribute()
    {
        return asset('storage/' . $this->image_6);
    }
}
