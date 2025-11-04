<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('events', EventController::class);
Route::resource('rooms', RoomController::class);
