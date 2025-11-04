<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::resource('/rooms', RoomController::class)->except(['index']);
