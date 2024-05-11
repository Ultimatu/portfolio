<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\CvDownloader;
use App\Models\Newsletter;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Notification;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string|min:5',
            'message' => 'required|string|min:10|max:500',
        ]);

        $contact = Contact::create($request->all());
        // send email
        $user = User::activeAccount()->first();
        Notification::sendNow($user, new \App\Notifications\Contact($request->all()));

        return back()->with('success', 'Votre message a été envoyé avec succès.');
    }
    

    public function unSubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $newsletter = Newsletter::where('email', $request->email)->first();

        if ($newsletter) {
            $newsletter->update([
                'is_active' => false,
                'unsubscribed_at' => now(),
                'unsubscribed_reason' => 'User unsubscribed',
                'unsubscribed_ip' => $request->ip(),
            ]);

            return back()->with('success', 'Vous avez été désabonné avec succès.');
        }

        return back()->with('error', 'Désolé, nous n\'avons pas pu vous désabonner.');
    }



    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $newsletter = Newsletter::where('email', $request->email)->first();

        if ($newsletter) {
            $newsletter->update([
                'is_active' => true,
                'subscribed_at' => now(),
                'unsubscribed_at' => null,
                'unsubscribed_reason' => null,
                'unsubscribed_ip' => null,
            ]);

            return back()->with('success', 'Vous avez été abonné avec succès.');
        }

        Newsletter::create([
            'email' => $request->email,
            'is_active' => true,
            'subscribed_at' => now(),
        ]);

        $user = User::activeAccount()->first();

        Notification::sendNow($user, new \App\Notifications\Newsletter($request->email));

        return back()->with('success', 'Vous avez été abonné avec succès.');
    }
    

    public function hasDownloadedCv(Request $request)
    {
        $visitor = Visitor::where('ip', $request->ip())->first();
        if ($visitor) {
            $visitor->update([
                'has_downloaded_cv' => true
            ]);

            $cvDown = CvDownloader::where('visitor_id', $visitor->id)->first();
            if ($cvDown) {
                $cvDown->update([
                    'count' => $cvDown->count + 1,
                ]);
            } else {
                CvDownloader::create([
                    'visitor_id' => $visitor->id,
                    'count' => 1,
                ]);
            }

            return response()->json(['message' => 'success']);
        }

        return response()->json(['message' => 'error']);
    }
}
