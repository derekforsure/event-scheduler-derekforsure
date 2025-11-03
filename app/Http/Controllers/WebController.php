<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Event;

class WebController extends Controller
{
    public function rooms()
    {
        return view('rooms.index');
    }

    public function createRoom()
    {
        return view('rooms.create');
    }

    public function storeRoom(Request $request)
    {
        // This will be implemented later with validation and database interaction
        // For now, just redirect back to index
        return redirect()->route('rooms.index')->with('success', 'Room created (placeholder)!');
    }

    public function editRoom($id)
    {
        // This will be implemented later to fetch room data
        $room = (object)['id' => $id, 'name' => 'Sample Room', 'capacity' => 50, 'open_time' => '08:00', 'close_time' => '17:00']; // Placeholder
        return view('rooms.edit', compact('room'));
    }

    public function updateRoom(Request $request, $id)
    {
        // This will be implemented later with validation and database interaction
        // For now, just redirect back to index
        return redirect()->route('rooms.index')->with('success', 'Room updated (placeholder)!');
    }

    public function events()
    {
        return view('events.index');
    }

    public function createEvent()
    {
        return view('events.create');
    }

    public function storeEvent(Request $request)
    {
        // This will be implemented later with validation and database interaction
        // For now, just redirect back to index
        return redirect()->route('events.index')->with('success', 'Event created (placeholder)!');
    }

    public function editEvent($id)
    {
        // This will be implemented later to fetch event data
        $event = (object)['id' => $id, 'title' => 'Sample Event', 'start_time' => '2025-11-03 09:00:00', 'end_time' => '2025-11-03 10:00:00', 'participants' => 10, 'room_id' => 1, 'user_id' => 1]; // Placeholder
        return view('events.edit', compact('event'));
    }

    public function updateEvent(Request $request, $id)
    {
        // This will be implemented later with validation and database interaction
        // For now, just redirect back to index
        return redirect()->route('events.index')->with('success', 'Event updated (placeholder)!');
    }
}
