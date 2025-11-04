<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $totalRooms = Room::count();
        $totalOrganizers = User::count(); // Assuming all users are organizers for now
        $upcomingEvents = Event::where('start_time', '>=', now())
                               ->orderBy('start_time')
                               ->limit(5)
                               ->get();

        return view('dashboard', compact('totalEvents', 'totalRooms', 'totalOrganizers', 'upcomingEvents'));
    }
}
