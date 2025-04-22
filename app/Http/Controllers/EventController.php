<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Categories;
use App\Models\Venues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('user_id', Auth::id())
            ->with('category', 'venue')
            ->latest()
            ->get();

        return view('organizer.events.list', compact('events'));
    }
    public function show(Event $event)
    {
        if (!$event->is_approved || $event->status !== 'active') {
            abort(404);
        }

        return view('frontend.description', compact('event'));
    }

    public function create()
    {
        $categories = Categories::all();
        $venues = Venues::all();
        return view('organizer.events.create', compact('categories', 'venues'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'venue_id' => 'required|exists:venues,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'price' => 'required|numeric|min:0',
            'max_attendees' => 'required|integer|min:1',
            'photo' => 'nullable|image|max:2048',
            'status' => 'required|in:pending,active,cancelled',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('event_photos', 'public');
        }

        $validated['user_id'] = Auth::id();
        $validated['organizer_id'] = Auth::id(); // Assuming the user is the organizer
        $validated['is_approved'] = false;

        Event::create($validated);

        return redirect()->route('organizer.events.index')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        if ($event->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Categories::all();
        $venues = Venues::all();
        return view('organizer.events.edit', compact('event', 'categories', 'venues'));
    }

    public function update(Request $request, Event $event)
    {
        if ($event->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'venue_id' => 'required|exists:venues,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'price' => 'required|numeric|min:0',
            'max_attendees' => 'required|integer|min:1',
            'photo' => 'nullable|image|max:2048',
            'status' => 'required|in:pending,active,cancelled',
        ]);
        $validated['user_id'] = Auth::id();
        $validated['organizer_id'] = Auth::id(); // Optional if user is organizer

        if ($request->hasFile('photo')) {
            if ($event->photo) {
                Storage::disk('public')->delete($event->photo);
            }
            $validated['photo'] = $request->file('photo')->store('event_photos', 'public');
        }

        $event->update($validated);
        return redirect()->route('organizer.events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        if ($event->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($event->photo) {
            Storage::disk('public')->delete($event->photo);
        }

        $event->delete();
        return redirect()->route('organizer.events.index')->with('success', 'Event deleted successfully!');
    }
}
