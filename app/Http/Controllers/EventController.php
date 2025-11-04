<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Room;
use App\Models\User;
use App\Http\Requests\StoreEventRequest;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with(['room', 'organizer'])->get();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Room::all();
        $organizers = User::all();
        return view('events.create', compact('rooms', 'organizers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $data = $request->validated();
        $data['color'] = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
        Event::create($data);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $rooms = Room::all();
        $organizers = User::all();
        return view('events.edit', compact('event', 'rooms', 'organizers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEventRequest $request, Event $event)
    {
        $event->update($request->validated());

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

    /**
     * Get events for FullCalendar.
     */
    public function apiEvents()
    {
        $events = Event::with(['room', 'organizer'])->get();

        return response()->json($events->map(function ($event) {
            return [
                'id' => $event->id,
                'title' => $event->title,
                'start' => $event->start_time,
                'end' => $event->end_time,
                'color' => $event->color,
                'room_name' => $event->room->name ?? 'N/A',
                'organizer_name' => $event->organizer->name ?? 'N/A',
            ];
        }));
    }

    /**
     * Display a listing of events for a specific room.
     */
    public function eventsByRoom(Room $room)
    {
        $events = $room->events()->with(['organizer'])->get();
        return view('events.by-room', compact('room', 'events'));
    }
}
