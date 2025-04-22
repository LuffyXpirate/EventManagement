<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontend.home');
    }
    public function event()
    {
        $events = Event::where('is_approved', true)
        ->where('status', 'active')
        ->where('end_time', '>', now())
        ->with('category', 'venue')
        ->paginate(9);
        return view('frontend.eventts',compact('events'));
    }
   

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

}
