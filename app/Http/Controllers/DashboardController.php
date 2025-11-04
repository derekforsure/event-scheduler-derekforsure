<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $totalRooms = Room::count();

        return view('dashboard', compact('totalEvents', 'totalRooms'));
    }
}
