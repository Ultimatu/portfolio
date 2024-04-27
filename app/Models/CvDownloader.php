<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvDownloader extends Model
{
    use HasFactory;

    protected $fillable = [
        'visitor_id',
        'count',
    ];

    protected $casts = [
        'visitor_id' => 'integer',
        'count' => 'integer',
    ];


    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
}
