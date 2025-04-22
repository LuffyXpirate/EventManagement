<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;

class OrganizerManagementController extends Controller
{
    public function index()
    {
        $organizer = User::whereIn('user_type', [ 'organizer'])->latest()->get();
        return view('admin.admin.manageorganizer.list', compact('organizer'));
    }
    public function destroy($id)
    {
        $organizer = User::findorfail($id);
        $organizer->delete();
        return redirect()->route('admin.organizers.index')->with('success', 'OrganizerDeleted Successfully');
    }



    public function eventindex()
    {
        // Change this from true to false to get pending events
        $events = Event::with('user')
                   ->where('is_approved', false) // ← This is the critical fix
                   ->orderBy('created_at', 'desc')
                   ->paginate(10);
    
        return view('admin.admin.events.index', compact('events'));
    }

   
   
public function approve(Event $event)
{
    $event->update([
        'is_approved' => true,
        'status' => 'active',
    ]);

    return redirect()->back()->with('success', 'Event approved successfully!');
}
    
    public function eventdestroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }
}

