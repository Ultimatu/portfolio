<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'session_id', 
        'country',
        'city',
        'state',
        'state_code',
        'zip',
        'is_first_time',
        'last_visit_at',
        'first_visit_at',
        'device',
        'visits',
        'browser',
    ];


    protected $casts = [
        'is_first_time' => 'boolean',
        'last_visit_at' => 'datetime',
        'first_visit_at' => 'datetime',
        'visits' => 'integer',
    ];

    public function cvDownloads()
    {
        return $this->hasMany(CvDownloader::class);
    }


    public function createOrUpdate(array $data)
    {
        $visitor = Visitor::where('ip', $data['ip'])->first();

        if ($visitor) {
            $session_id = $data['session_id'];
            if ($visitor->session_id !== $session_id) {
                //increment visits
                $visitor->visits += 1;
                $visitor->session_id = $session_id;
                $visitor->save();
            }
            else {
                $visitor->update($data);
            }
        } else {
            $visitor = Visitor::create($data);
        }

        return $visitor;
    }


}
