<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use GeoIp2\Database\Reader;

class VisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // protected $fillable = [
        //     'ip',
        //     'session_id', 
        //     'country',
        //     'city',
        //     'state',
        //     'state_code',
        //     'zip',
        //     'is_first_time',
        //     'last_visit_at',
        //     'first_visit_at',
        //     'device',
        //     'visits',
        //     'browser',
        // ];
    
    
        // protected $casts = [
        //     'is_first_time' => 'boolean',
        //     'last_visit_at' => 'datetime',
        //     'first_visit_at' => 'datetime',
        //     'visits' => 'integer',
        // ];
    
        // public function cvDownloads()
        // {
        //     return $this->hasMany(CvDownloader::class);
        // }
    
    
        // public function createOrUpdate(array $data)
        // {
        //     $visitor = Visitor::where('ip', $data['ip'])->first();
    
        //     if ($visitor) {
        //         $session_id = $data['session_id'];
        //         if ($visitor->session_id !== $session_id) {
        //             //increment visits
        //             $visitor->visits += 1;
        //             $visitor->session_id = $session_id;
        //             $visitor->save();
        //         }
        //         else {
        //             $visitor->update($data);
        //         }
        //     } else {
        //         $visitor = Visitor::create($data);
        //     }
    
        //     return $visitor;
        // }
        if (config('app.env') === 'production') {
            $ip_address = $request->ip();
            $reader = new Reader(storage_path('app/geoip/GeoLite2-City.mmdb'), ['fr']);
            $record = $reader->city($ip_address);
            $country = $record->country->name;
            $city = $record->city->name;
            $state = $record->mostSpecificSubdivision->name;
            $state_code = $record->mostSpecificSubdivision->isoCode;
            $zip = $record->postal->code;
            $device = $request->header('User-Agent');
            $browser = $request->header('User-Agent');
            $visitor = Visitor::where('ip_address', $ip_address)->first();
            if ($visitor) {
                $session_id = session()->getId();
                if ($visitor->session_id !== $session_id) {
                    $visitor->visits += 1;
                    $visitor->session_id = $session_id;
                    $visitor->save();
                } else {
                    $visitor->update([
                        'country' => $country,
                        'city' => $city,
                        'state' => $state,
                        'state_code' => $state_code,
                        'zip' => $zip,
                        'device' => $device,
                        'browser' => $browser
                    ]);
                }
            } else {
                $session_id = session()->getId();
                Visitor::create([
                    'ip_address' => $ip_address,
                    'session_id' => $session_id,
                    'country' => $country,
                    'city' => $city,
                    'state' => $state,
                    'state_code' => $state_code,
                    'zip' => $zip,
                    'device' => $device,
                    'browser' => $browser
                ]);
            }
        } else {
            $ip = $request->ip();
            $session_id = session()->getId();
            $visitor = Visitor::where('ip', $ip)->first();
            if ($visitor) {
                if ($visitor->session_id !== $session_id) {
                    $visitor->visits += 1;
                    $visitor->session_id = $session_id;
                    $visitor->save();
                }
            } else {
                $ip = $request->ip();
                $session_id = session()->getId();
                Visitor::create([
                    'ip' => $ip,
                    'session_id' => $session_id
                ]);
            }
        }
        return $next($request);
    }
}
